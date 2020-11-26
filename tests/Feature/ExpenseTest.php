<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Expense;
use Tests\TestCase;

class ExpenseTest extends TestCase
{
    use RefreshDatabase;

    public function testItCanListAllExpenses()
    {
        $times = 50;

        Expense::factory()->times($times)->create();

        $response = $this->get('/api/expenses');

        $response->assertStatus(200)->assertJsonCount($times, 'data');
    }

    public function testItCanCreateAnExpense()
    {
        $testExpense = Expense::factory()->make()->toArray();

        $response = $this->postJson('/api/expenses', $testExpense);
        
        $response->assertStatus(201)->assertJson(['data' => $testExpense]);
    }

    public function testItCanReadASingleExpense()
    {
        $testExpense = Expense::factory()->create();

        $response = $this->get('/api/expenses/'.$testExpense->id);

        $response->assertStatus(200)
                    ->assertJson(['data' =>
                            [
                                'description' => $testExpense->description,
                                'value' => $testExpense->value
                            ]
                        ]);
    }

    public function testItCanUpdateAnExpense()
    {
        $testExpense = Expense::factory()->create();

        $testUpdateExpense = Expense::factory()->make();

        $response = $this->putJson('/api/expenses/'.$testExpense->id, ['description' => $testUpdateExpense->description, 'value' => $testUpdateExpense->value]);
        
        $response->assertStatus(200)->assertJson(['data' => ['description' => $testUpdateExpense->description, 'value' => $testUpdateExpense->value]]);
    }

    public function testItCanDeleteAnExpense()
    {
        $testExpense = Expense::factory()->create();

        $response = $this->delete('/api/expenses/'.$testExpense->id);
        
        $response->assertStatus(200);

        $this->assertDatabaseMissing('expenses', $testExpense->toArray());
    }
}
