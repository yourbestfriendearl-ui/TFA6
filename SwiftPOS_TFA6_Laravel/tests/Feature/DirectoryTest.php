<?php

namespace Tests\Feature;

use App\Models\Customer;
use App\Models\User;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DirectoryTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(DatabaseSeeder::class);
    }

    public function test_all_four_pages_are_available(): void
    {
        foreach (['/', '/about', '/customers', '/users'] as $route) {
            $this->get($route)->assertOk();
        }
    }

    public function test_directories_receive_eloquent_models(): void
    {
        $this->get('/customers')->assertOk()->assertViewHas('customers', fn ($rows) =>
            $rows instanceof Collection && $rows->count() === 5 && $rows->first() instanceof Customer
        )->assertSee('ana.reyes@example.com')->assertSee('0917 555 0101');

        $this->get('/users')->assertOk()->assertViewHas('users', fn ($rows) =>
            $rows instanceof Collection && $rows->count() === 5 && $rows->first() instanceof User
        )->assertSee('earl.velasquez')->assertSee('Inventory Staff');
    }

    public function test_database_changes_appear_in_both_directories(): void
    {
        Customer::where('email', 'ana.reyes@example.com')->firstOrFail()->update(['full_name' => 'Updated customer']);
        User::where('username', 'earl.velasquez')->firstOrFail()->update(['full_name' => 'Updated staff']);
        $this->get('/customers')->assertSee('Updated customer')->assertDontSee('Ana Reyes');
        $this->get('/users')->assertSee('Updated staff')->assertDontSee('Earl Christian R. Velasquez');
    }

    public function test_empty_tables_show_empty_states(): void
    {
        Customer::query()->delete();
        User::query()->delete();
        $this->get('/customers')->assertOk()->assertSee('No customers found.');
        $this->get('/users')->assertOk()->assertSee('No users found.');
    }

    public function test_seeders_can_run_again_without_duplicates_or_resetting_creation_time(): void
    {
        $customer = Customer::where('email', 'ana.reyes@example.com')->firstOrFail();
        $user = User::where('username', 'earl.velasquez')->firstOrFail();
        $createdAt = $customer->created_at->copy();
        $staffCreatedAt = $user->created_at->copy();
        $this->assertNotNull($customer->updated_at);
        $this->assertNotNull($user->updated_at);
        $this->travel(1)->hours();
        $this->seed(DatabaseSeeder::class);
        $this->assertDatabaseCount('customers', 5);
        $this->assertDatabaseCount('users', 5);
        $this->assertTrue($customer->fresh()->created_at->equalTo($createdAt));
        $this->assertTrue($user->fresh()->created_at->equalTo($staffCreatedAt));
        $this->assertSame('0917 555 0101', $customer->fresh()->phone);
    }

    public function test_duplicate_customer_email_is_rejected(): void
    {
        $this->expectException(QueryException::class);
        Customer::create(['full_name' => 'Duplicate', 'email' => 'ana.reyes@example.com', 'phone' => '0917 555 0109']);
    }

    public function test_duplicate_username_is_rejected(): void
    {
        $this->expectException(QueryException::class);
        User::create(['username' => 'earl.velasquez', 'full_name' => 'Duplicate', 'role' => 'Cashier']);
    }

    public function test_database_text_is_escaped_in_html(): void
    {
        Customer::query()->firstOrFail()->update(['full_name' => '<script>alert(1)</script>']);
        $this->get('/customers')->assertSee('&lt;script&gt;alert(1)&lt;/script&gt;', false)
            ->assertDontSee('<script>alert(1)</script>', false);
    }
}
