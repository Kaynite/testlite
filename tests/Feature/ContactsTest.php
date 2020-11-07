<?php

namespace Tests\Feature;

use App\Models\Contact;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ContactsTest extends TestCase
{
    use RefreshDatabase;

    private $requiredFields = ['name', 'email', 'birthday', 'company'];

    /** @test */
    public function contactCanBeAdded()
    {
        $this->post('/api/contacts', $this->data());
        $this->assertCount(1, Contact::all());
        $contact = Contact::first();
        $this->assertEquals('Test name', $contact->name);

    }

    /** @test */
    public function fieldIsRequired()
    {
        collect($this->requiredFields)->each(function ($field) {
            $response = $this->post('/api/contacts', array_merge($this->data(), [$field => '']));
            $response->assertSessionHasErrors($field);
            $this->assertCount(0, Contact::all());
        });
    }

    /** @test */
    public function validateEmail()
    {
        $response = $this->post('/api/contacts', array_merge($this->data(), ['email' => 'Not an email']));
        $response->assertSessionHasErrors('email');
        $this->assertCount(0, Contact::all());
    }

    /** @test */
    public function validateBirthday()
    {
        $this->post('/api/contacts', $this->data());
        $this->assertCount(1, Contact::all());
        $contact = Contact::first();
        $this->assertInstanceOf(Carbon::class, $contact->birthday);
    }

    /** @test */
    public function retrieveContact()
    {
        $contact  = Contact::factory()->create();
        $response = $this->get("/api/contacts/{$contact->id}");
        $response->assertJson([
            'name'     => $contact->name,
            'email'    => $contact->email,
            'birthday' => "1995-06-27T00:00:00.000000Z",
            'company'  => $contact->company
        ]);
    }

    /** @test */
    public function updateContact()
    {
        $contact  = Contact::factory()->create();
        $this->patch("/api/contacts/{$contact->id}", $this->data());
        $contact = $contact->fresh();
        $this->assertEquals('Test name', $contact->name);
    }

    /** @test */
    public function deleteContact()
    {
        $contact  = Contact::factory()->create();
        $this->delete("/api/contacts/{$contact->id}");
        $this->assertCount(0, Contact::all());
    }

    private function data()
    {
        return [
            'name'     => 'Test name',
            'email'    => 'test@email.com',
            'birthday' => '06/27/1995', // MM/DD/YYYY
            'company'  => 'ABC Company',
        ];
    }
}
