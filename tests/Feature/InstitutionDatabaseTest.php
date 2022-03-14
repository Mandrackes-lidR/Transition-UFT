<?php

namespace Tests\Feature;

use App\Models\Institution;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class InstitutionDatabaseTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Create and save an institution.
     *
     * @return void
     */
    public function testCreateInstitution1(): void
    {
        $institution = new Institution();
        $institution->name = 'Foo';
        $institution->save();

        $this->assertDatabaseHas('institutions', [
            'name' => 'Foo',
        ]);
    }

    /**
     * Cannot create and save an institution with a non-unique name.
     *
     * @return void
     */
    public function testCreateInstitution2(): void
    {
        $institution = new Institution();
        $institution->name = 'Foo';
        $institution->save();

        $institution = new Institution();
        $institution->name = 'Foo';

        $this->expectException(QueryException::class);
        $institution->save();
    }

    /**
     * Create and save an institution using mass assignment.
     *
     * @return void
     */
    public function testMassAssignInstitution(): void
    {
        Institution::create([
            'name' => 'Foo',
        ]);

        $this->assertDatabaseHas('institutions', [
            'name' => 'Foo',
        ]);
    }

    /**
     * Update an institution.
     *
     * @return void
     */
    public function testUpdateInstitution1(): void
    {
        Institution::factory()->create();

        $this->assertDatabaseMissing('institutions', [
            'name' => 'Fork',
        ]);

        $institution = Institution::latest()->first();
        $institution->name = 'Fork';
        $institution->save();

        $this->assertDatabaseHas('institutions', [
            'name' => 'Fork',
        ]);
    }

    /**
     * Cannot update an institution with an non-unique name.
     *
     * @return void
     */
    public function testUpdateInstitution2(): void
    {
        Institution::factory()->create(['name' => 'Fork']);
        $this->assertDatabaseHas('institutions', [
            'name' => 'Fork',
        ]);

        Institution::factory()->create(['name' => 'Knife']);
        $institution = Institution::firstWhere(['name' => 'Knife']);
        $this->assertNotSame('Fork', $institution->name);
        $institution->name = 'Fork';

        $this->expectException(QueryException::class);
        $institution->save();
    }

    /**
     * Update an institution with a mass assignment.
     *
     * @return void
     */
    public function testMassUpdateInstitution(): void
    {
        Institution::factory()->create();

        $this->assertDatabaseMissing('institutions', [
            'name' => 'Fork',
        ]);

        $institution = Institution::latest()->first();
        $institution->update(['name' => 'Fork']);

        $this->assertDatabaseHas('institutions', [
            'name' => 'Fork',
        ]);
    }

    /**
     * Collect all the institutions.
     *
     * @return void
     */
    public function testCollectInstitutions(): void
    {
        Institution::factory()->count(20)->create();

        $this->assertDatabaseCount('institutions', 20);

        $institutions = Institution::all();
        self::assertEquals(20, $institutions->count());
    }

    /**
     * Delete an institution.
     *
     * @return void
     * @throws Exception
     */
    public function testDeleteInstitution(): void
    {
        Institution::factory()->create();

        $this->assertDatabaseCount('institutions', 1);

        $institution = Institution::latest()->first();
        $institution->delete();

        $this->assertDatabaseCount('institutions', 0);
    }
}
