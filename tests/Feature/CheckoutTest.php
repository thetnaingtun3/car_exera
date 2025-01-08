<?php

use App\Models\User;
use App\Models\Subject;
use App\Models\Checkout;
use App\Models\Invoice;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Testing\RefreshDatabase;


//uses(RefreshDatabase::class);
test('creates an invoice when checkout type is screenshot', function () {
    // Arrange: create a user and mock the auth
    $user = User::factory()->create();
    //actingAs($user);
    \Pest\Laravel\actingAs($user);

    // Arrange: create subjects with specific prices
    $subject1 = Subject::factory()->create(['price' => 100]);
    $subject2 = Subject::factory()->create(['price' => 200]);

    // Create the request payload
    $data = [
        'subject_id' => [$subject1->id, $subject2->id],
        'checkout_type' => 'screenshot',
    ];

    // Act: Make a post request to the checkout route
    $response = post(route('checkout.post'), $data);

    // Assert: Check if the invoice is created
    $response->assertStatus(200);
    expect(Invoice::count())->toBe(1);

    // Get the latest invoice
    $invoice = Invoice::latest()->first();

    // Assert: Check if the invoice total is correct
    expect($invoice->total)->toBe(300);
    expect($invoice->invoice_number)->toBe('SFIX000001');

    // Assert: Check if the checkout IDs are attached to the invoice
    $checkout = Checkout::first();
    expect($invoice->checkout()->where('checkout_id', $checkout->id)->exists())->toBeTrue();
});
