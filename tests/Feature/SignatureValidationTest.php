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
            'contactable' => '',
            'phone' => '+33123456789',
        ]);

        $response->assertValid([
            'first_name',
            'last_name',
            'email',
            'institution_id',
            'category',
            'register',
            'contactable',
            'phone',
        ]);
        $response->assertRedirect('/');
        $this->assertDatabaseHas('signatures', [
            'first_name' => 'Foo',
            'last_name' => 'Bar',
            'email' => 'foo@bar.tld',
            'institution_id' => $institution->id,
            'category' => 'student',
            'contactable' => null,
            'email_verified_at' => null,
            'phone' => '+33123456789',
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
            'contactable' => 'on',
            'phone' => '+33123456789',
        ]);

        $response->assertValid([
            'last_name',
            'email',
            'institution_id',
            'category',
            'register',
            'contactable',
            'phone',
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
            'contactable' => 'on',
            'phone' => '+33123456789',
        ]);

        $response->assertValid([
            'first_name',
            'email',
            'institution_id',
            'category',
            'register',
            'contactable',
            'phone',
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
            'contactable' => 'on',
            'phone' => '+33123456789',
        ]);

        $response->assertValid([
            'first_name',
            'last_name',
            'institution_id',
            'category',
            'register',
            'contactable',
            'phone',
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
            'contactable' => 'on',
            'phone' => '+33123456789',
        ]);

        $response->assertValid([
            'first_name',
            'last_name',
            'email',
            'institution_id',
            'category',
            'contactable',
            'phone',
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
            'contactable' => 'on',
            'phone' => '+33123456789',
        ]);

        $response->assertValid([
            'first_name',
            'last_name',
            'email',
            'category',
            'register',
            'contactable',
            'phone',
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
            'contactable' => 'on',
            'phone' => '+33123456789',
        ]);

        $response->assertValid([
            'first_name',
            'last_name',
            'email',
            'institution_id',
            'register',
            'contactable',
            'phone',
        ]);
        $response->assertInvalid([
            'category',
        ]);
        $response->assertRedirect('/');
        $this->assertDatabaseCount('signatures', 0);
    }

    /**
     * Contactable is missing
     *
     * @return void
     */
    public function testSignMissing7(): void
    {
        $institution = Institution::factory()->create();
        $response = $this->post('/', [
            'first_name' => 'Foo',
            'last_name' => 'Bar',
            'email' => 'foo@bar.tld',
            'institution_id' => $institution->id,
            'category' => 'other',
            'register' => 'on',
            'phone' => '01 23 45 67 89',
        ]);

        // This field is nullable or has a default value,
        // therefore it is still valid if it is missing
        $response->assertValid([
            'first_name',
            'last_name',
            'email',
            'institution_id',
            'category',
            'register',
            'contactable',
            'phone',
        ]);
        $response->assertRedirect('/');
        $this->assertDatabaseCount('signatures', 1);
    }

    /**
     * Phone is missing
     *
     * @return void
     */
    public function testSignMissing8(): void
    {
        $institution = Institution::factory()->create();
        $response = $this->post('/', [
            'first_name' => 'Foo',
            'last_name' => 'Bar',
            'email' => 'foo@bar.tld',
            'institution_id' => $institution->id,
            'category' => 'other',
            'register' => 'on',
            'contactable' => 'on',
        ]);

        // This field is nullable or has a default value,
        // therefore it is still valid if it is missing
        $response->assertValid([
            'first_name',
            'last_name',
            'email',
            'institution_id',
            'category',
            'register',
            'contactable',
            'phone',
        ]);
        $response->assertRedirect('/');
        $this->assertDatabaseCount('signatures', 1);
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
            'contactable' => 'on',
            'phone' => '+33 1 23 45 67 89',
        ]);

        $response->assertValid([
            'last_name',
            'email',
            'institution_id',
            'category',
            'register',
            'contactable',
            'phone',
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
            'contactable' => 'on',
            'phone' => '0123456789',
        ]);

        $response->assertValid([
            'first_name',
            'email',
            'institution_id',
            'category',
            'register',
            'contactable',
            'phone',
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
            'contactable' => 'on',
            'phone' => '+33123456789',
        ]);

        $response->assertValid([
            'first_name',
            'last_name',
            'institution_id',
            'category',
            'register',
            'contactable',
            'phone',
        ]);
        $response->assertInvalid([
            'email',
        ]);
        $response->assertRedirect('/');
        $this->assertDatabaseCount('signatures', 0);
    }

    /**
     * Terms checkbox is not checked
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
            'contactable' => 'on',
            'phone' => '+33 (0)1 23 45 67 89',
        ]);

        $response->assertValid([
            'first_name',
            'last_name',
            'email',
            'institution_id',
            'category',
            'contactable',
            'phone',
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
            'contactable' => 'on',
            'phone' => '+33123456789',
        ]);

        $response->assertValid([
            'first_name',
            'last_name',
            'email',
            'category',
            'register',
            'contactable',
            'phone',
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
            'contactable' => 'on',
            'phone' => '+33123456789',
        ]);

        $response->assertValid([
            'first_name',
            'last_name',
            'email',
            'institution_id',
            'register',
            'contactable',
            'phone',
        ]);
        $response->assertInvalid([
            'category',
        ]);
        $response->assertRedirect('/');
        $this->assertDatabaseCount('signatures', 0);
    }

    /**
     * Contactable checkbox is not checked
     *
     * @return void
     */
    public function testSignEmpty7(): void
    {
        $institution = Institution::factory()->create();
        $response = $this->post('/', [
            'first_name' => 'Foo',
            'last_name' => 'Bar',
            'email' => 'foo@bar.tld',
            'institution_id' => $institution->id,
            'category' => 'other',
            'register' => 'on',
            'contactable' => '',
            'phone' => '+33123456789',
        ]);

        // This field is nullable or has a default value,
        // therefore it is still valid if it is empty
        $response->assertValid([
            'first_name',
            'last_name',
            'email',
            'institution_id',
            'register',
            'category',
            'contactable',
            'phone',
        ]);
        $response->assertRedirect('/');
        $this->assertDatabaseCount('signatures', 1);
    }

    /**
     * Phone is empty
     *
     * @return void
     */
    public function testSignEmpty8(): void
    {
        $institution = Institution::factory()->create();
        $response = $this->post('/', [
            'first_name' => 'Foo',
            'last_name' => 'Bar',
            'email' => 'foo@bar.tld',
            'institution_id' => $institution->id,
            'category' => 'other',
            'register' => 'on',
            'contactable' => 'on',
            'phone' => '',
        ]);

        // This field is nullable or has a default value,
        // therefore it is still valid if it is empty
        $response->assertValid([
            'first_name',
            'last_name',
            'email',
            'institution_id',
            'register',
            'category',
            'contactable',
            'phone',
        ]);
        $response->assertRedirect('/');
        $this->assertDatabaseCount('signatures', 1);
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
            'contactable' => 'on',
        ]);

        $response->assertValid([
            'first_name',
            'last_name',
            'institution_id',
            'category',
            'register',
            'contactable',
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

    /**
     * Phone is too short
     *
     * @return void
     */
    public function testPhone1(): void
    {
        $institution = Institution::factory()->create();
        $response = $this->post('/', [
            'first_name' => 'Foo',
            'last_name' => 'Bar',
            'email' => 'foo@bar.tld',
            'institution_id' => $institution->id,
            'category' => 'other',
            'register' => 'on',
            'contactable' => 'on',
            'phone' => '0',
        ]);

        // This field is nullable or has a default value,
        // therefore it is still valid if it is empty
        $response->assertValid([
            'first_name',
            'last_name',
            'email',
            'institution_id',
            'register',
            'category',
            'contactable',
        ]);
        $response->assertInvalid([
            'phone',
        ]);
        $response->assertRedirect('/');
        $this->assertDatabaseCount('signatures', 0);
    }

    /**
     * Phone is too long
     *
     * @return void
     */
    public function testPhone2(): void
    {
        $institution = Institution::factory()->create();
        $response = $this->post('/', [
            'first_name' => 'Foo',
            'last_name' => 'Bar',
            'email' => 'foo@bar.tld',
            'institution_id' => $institution->id,
            'category' => 'other',
            'register' => 'on',
            'contactable' => 'on',
            'phone' => '123456789012345678901',
        ]);

        // This field is nullable or has a default value,
        // therefore it is still valid if it is empty
        $response->assertValid([
            'first_name',
            'last_name',
            'email',
            'institution_id',
            'register',
            'category',
            'contactable',
        ]);
        $response->assertInvalid([
            'phone',
        ]);
        $response->assertRedirect('/');
        $this->assertDatabaseCount('signatures', 0);
    }

    /**
     * Phone doesn't start with 0 or +
     *
     * @return void
     */
    public function testPhone3(): void
    {
        $institution = Institution::factory()->create();
        $response = $this->post('/', [
            'first_name' => 'Foo',
            'last_name' => 'Bar',
            'email' => 'foo@bar.tld',
            'institution_id' => $institution->id,
            'category' => 'other',
            'register' => 'on',
            'contactable' => 'on',
            'phone' => '1234567890',
        ]);

        // This field is nullable or has a default value,
        // therefore it is still valid if it is empty
        $response->assertValid([
            'first_name',
            'last_name',
            'email',
            'institution_id',
            'register',
            'category',
            'contactable',
        ]);
        $response->assertInvalid([
            'phone',
        ]);
        $response->assertRedirect('/');
        $this->assertDatabaseCount('signatures', 0);
    }

    /**
     * Phone contains forbidden characters
     *
     * @return void
     */
    public function testPhone4(): void
    {
        $institution = Institution::factory()->create();
        $response = $this->post('/', [
            'first_name' => 'Foo',
            'last_name' => 'Bar',
            'email' => 'foo@bar.tld',
            'institution_id' => $institution->id,
            'category' => 'other',
            'register' => 'on',
            'contactable' => 'on',
            'phone' => '012345678p',
        ]);

        // This field is nullable or has a default value,
        // therefore it is still valid if it is empty
        $response->assertValid([
            'first_name',
            'last_name',
            'email',
            'institution_id',
            'register',
            'category',
            'contactable',
        ]);
        $response->assertInvalid([
            'phone',
        ]);
        $response->assertRedirect('/');
        $this->assertDatabaseCount('signatures', 0);
    }
}
