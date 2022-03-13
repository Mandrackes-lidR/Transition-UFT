<?php

namespace Database\Factories;

use App\Enums\SignatoryCategory;
use App\Models\Signature;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @method forInstitution(string[] $array)
 */
class SignatureFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Signature::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $email = $this->faker->unique()->email;
        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'email' => $email,
            'category' => $this->faker->randomElement(SignatoryCategory::valueList()),
        ];
    }

    /**
     * Indicate that the signature's email has been verified
     *
     * @return SignatureFactory
     */
    public function confirmed(): SignatureFactory
    {
        return $this->state(function () {
            return [
                'email_verified_at' => Carbon::Now(),
            ];
        });
    }
}
