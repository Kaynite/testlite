<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Contact;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ContactsTest extends TestCase
{
    use RefreshDatabase;
    
    /** @test */
    public function contactCanBeAdded()
    {
        $this->withExceptionHandling();
        $this->post('/api/contacts', ['name' => 'Test']);
        $this->assertCount(1, Contact::all());
    }
}
