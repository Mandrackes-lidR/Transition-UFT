<?php

namespace Tests\Feature;

use App\Models\Institution;
use App\Models\Signature;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SignatureValidationTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * Submit a filled signing form
     *
     * @return void
     */
    public function testSign(): void
    {
        $institution = Institution::factory()->create();
        $response = $this->post('/', [
            'first_name' => 'Foo',
            'last_name' => 'Bar',
            'email' => 'foo@bar.tld',
            'institution_id' => $institution->id,
            'category' => 'student',
            'register' => 'on',
        ]);

        $response->assertValid([
            'first_name',
            'last_name',
            'email',
            'institution_id',
            'category',
            'register',
        ]);
        $response->assertRedirect('/');
        $this->assertDatabaseHas('signatures', [
            'first_name' => 'Foo',
            'last_name' => 'Bar',
            'email' => 'foo@bar.tld',
            'institution_id' => $institution->id,
            'category' => 'student',
            'email_verified_at' => null,
        ]);
    }

    /**
     * First name is missing
     *
     * @return void
     */
    public function testSignMissing1(): void
    {
        $institution = Institution::factory()->create();
        $response = $this->post('/', [
            'last_name' => 'Bar',
            'email' => 'foo@bar.tld',
            'institution_id' => $institution->id,
            'category' => 'student',
            'register' => 'on',
        ]);

        $response->assertValid([
            'last_name',
            'email',
            'institution_id',
            'category',
            'register',
        ]);
        $response->assertInvalid([
            'first_name',
        ]);
        $response->assertRedirect('/');
        $this->assertDatabaseCount('signatures', 0);
    }

    /**
     * Last name is missing
     *
     * @return void
     */
    public function testSignMissing2(): void
    {
        $institution = Institution::factory()->create();
        $response = $this->post('/', [
            'first_name' => 'Foo',
            'email' => 'foo@bar.tld',
            'institution_id' => $institution->id,
            'category' => 'student',
            'register' => 'on',
        ]);

        $response->assertValid([
            'first_name',
            'email',
            'institution_id',
            'category',
            'register',
        ]);
        $response->assertInvalid([
            'last_name',
        ]);
        $response->assertRedirect('/');
        $this->assertDatabaseCount('signatures', 0);
    }

    /**
     * Email is missing
     *
     * @return void
     */
    public function testSignMissing3(): void
    {
        $institution = Institution::factory()->create();
        $response = $this->post('/', [
            'first_name' => 'Foo',
            'last_name' => 'Bar',
            'institution_id' => $institution->id,
            'category' => 'student',
            'register' => 'on',
        ]);

        $response->assertValid([
            'first_name',
            'last_name',
            'institution_id',
            'category',
            'register',
        ]);
        $response->assertInvalid([
            'email',
        ]);
        $response->assertRedirect('/');
        $this->assertDatabaseCount('signatures', 0);
    }

    /**
     * Checkbox is missing
     *
     * @return void
     */
    public function testSignMissing4(): void
    {
        $institution = Institution::factory()->create();
        $response = $this->post('/', [
            'first_name' => 'Foo',
            'last_name' => 'Bar',
            'email' => 'foo@bar.tld',
            'institution_id' => $institution->id,
            'category' => 'student',
        ]);

        $response->assertValid([
            'first_name',
            'last_name',
            'email',
            'institution_id',
            'category',
        ]);
        $response->assertInvalid([
            'register',
        ]);
        $response->assertRedirect('/');
        $this->assertDatabaseCount('signatures', 0);
    }

    /**
     * Institution is missing
     *
     * @return void
     */
    public function testSignMissing5(): void
    {
        $institution = Institution::factory()->create();
        $response = $this->post('/', [
            'first_name' => 'Foo',
            'last_name' => 'Bar',
            'email' => 'foo@bar.tld',
            'category' => 'student',
            'register' => 'on',
        ]);

        $response->assertValid([
            'first_name',
            'last_name',
            'email',
            'category',
            'register',
        ]);
        $response->assertInvalid([
            'institution_id',
        ]);
        $response->assertRedirect('/');
        $this->assertDatabaseCount('signatures', 0);
    }

    /**
     * Category is missing
     *
     * @return void
     */
    public function testSignMissing6(): void
    {
        $institution = Institution::factory()->create();
        $response = $this->post('/', [
            'first_name' => 'Foo',
            'last_name' => 'Bar',
            'email' => 'foo@bar.tld',
            'institution_id' => $institution->id,
            'register' => 'on',
        ]);

        $response->assertValid([
            'first_name',
            'last_name',
            'email',
            'institution_id',
            'register',
        ]);
        $response->assertInvalid([
            'category',
        ]);
        $response->assertRedirect('/');
        $this->assertDatabaseCount('signatures', 0);
    }

    /**
     * First name is empty
     *
     * @return void
     */
    public function testSignEmpty1(): void
    {
        $institution = Institution::factory()->create();
        $response = $this->post('/', [
            'first_name' => '',
            'last_name' => 'Bar',
            'email' => 'foo@bar.tld',
            'institution_id' => $institution->id,
            'category' => 'student',
            'register' => 'on',
        ]);

        $response->assertValid([
            'last_name',
            'email',
            'institution_id',
            'category',
            'register',
        ]);
        $response->assertInvalid([
            'first_name',
        ]);
        $response->assertRedirect('/');
        $this->assertDatabaseCount('signatures', 0);
    }

    /**
     * Last name is empty
     *
     * @return void
     */
    public function testSignEmpty2(): void
    {
        $institution = Institution::factory()->create();
        $response = $this->post('/', [
            'first_name' => 'Foo',
            'last_name' => '',
            'email' => 'foo@bar.tld',
            'institution_id' => $institution->id,
            'category' => 'student',
            'register' => 'on',
        ]);

        $response->assertValid([
            'first_name',
            'email',
            'institution_id',
            'category',
            'register',
        ]);
        $response->assertInvalid([
            'last_name',
        ]);
        $response->assertRedirect('/');
        $this->assertDatabaseCount('signatures', 0);
    }

    /**
     * Email is empty
     *
     * @return void
     */
    public function testSignEmpty3(): void
    {
        $institution = Institution::factory()->create();
        $response = $this->post('/', [
            'first_name' => 'Foo',
            'last_name' => 'Bar',
            'email' => '',
            'institution_id' => $institution->id,
            'category' => 'student',
            'register' => 'on',
        ]);

        $response->assertValid([
            'first_name',
            'last_name',
            'institution_id',
            'category',
            'register',
        ]);
        $response->assertInvalid([
            'email',
        ]);
        $response->assertRedirect('/');
        $this->assertDatabaseCount('signatures', 0);
    }

    /**
     * Checkbox is not checked
     *
     * @return void
     */
    public function testSignEmpty4(): void
    {
        $institution = Institution::factory()->create();
        $response = $this->post('/', [
            'first_name' => 'Foo',
            'last_name' => 'Bar',
            'email' => 'foo@bar.tld',
            'institution_id' => $institution->id,
            'category' => 'student',
            'register' => '',
        ]);

        $response->assertValid([
            'first_name',
            'last_name',
            'email',
            'institution_id',
            'category',
        ]);
        $response->assertInvalid([
            'register',
        ]);
        $response->assertRedirect('/');
        $this->assertDatabaseCount('signatures', 0);
    }

    /**
     * Institution is empty
     *
     * @return void
     */
    public function testSignEmpty5(): void
    {
        $institution = Institution::factory()->create();
        $response = $this->post('/', [
            'first_name' => 'Foo',
            'last_name' => 'Bar',
            'email' => 'foo@bar.tld',
            'institution_id' => '',
            'category' => 'student',
            'register' => 'on',
        ]);

        $response->assertValid([
            'first_name',
            'last_name',
            'email',
            'category',
            'register',
        ]);
        $response->assertInvalid([
            'institution_id',
        ]);
        $response->assertRedirect('/');
        $this->assertDatabaseCount('signatures', 0);
    }

    /**
     * Category is empty
     *
     * @return void
     */
    public function testSignEmpty6(): void
    {
        $institution = Institution::factory()->create();
        $response = $this->post('/', [
            'first_name' => 'Foo',
            'last_name' => 'Bar',
            'email' => 'foo@bar.tld',
            'institution_id' => $institution->id,
            'category' => '',
            'register' => 'on',
        ]);

        $response->assertValid([
            'first_name',
            'last_name',
            'email',
            'institution_id',
            'register',
        ]);
        $response->assertInvalid([
            'category',
        ]);
        $response->assertRedirect('/');
        $this->assertDatabaseCount('signatures', 0);
    }

    /**
     * Email already used
     *
     * @return void
     */
    public function testEmailNotUnique(): void
    {
        $institution = Institution::factory()->create();

        $signature = new Signature();
        $signature->first_name = 'Bar';
        $signature->last_name = 'Foo';
        $signature->email = 'foo@bar.tld';
        $signature->institution_id = $institution->id;
        $signature->category = 'teacher';
        $signature->save();

        $this->assertDatabaseCount('signatures', 1);
        $this->assertDatabaseHas('signatures', [
            'first_name' => 'Bar',
            'email' => 'foo@bar.tld',
        ]);

        $response = $this->post('/', [
            'first_name' => 'Foo',
            'last_name' => 'Bar',
            'email' => 'foo@bar.tld',
            'institution_id' => $institution->id,
            'category' => 'student',
            'register' => 'on',
        ]);

        $response->assertValid([
            'first_name',
            'last_name',
            'institution_id',
            'category',
            'register',
        ]);
        $response->assertInvalid([
            'email',
        ]);
        $response->assertRedirect('/');
        $this->assertDatabaseCount('signatures', 1);
        $this->assertDatabaseMissing('signatures', [
            'first_name' => 'Foo',
            'email' => 'foo@bar.tld',
        ]);
    }
}
