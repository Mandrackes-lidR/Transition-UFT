<?php

namespace App\Models;

use App\Enums\SignatoryCategory;
use App\Notifications\VerifySignature;
use Database\Factories\SignatureFactory;
use Eloquent;
use Illuminate\Auth\MustVerifyEmail as VerifyEmail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\DatabaseNotificationCollection;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;

/**
 * App\Models\Signature
 *
 * @property int $id
 * @property string $email
 * @property string $first_name
 * @property string $last_name
 * @property int $institution_id
 * @property SignatoryCategory $category
 * @property Carbon|null $email_verified_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read string $full_name
 * @property-read Institution|null $institution
 * @property-read DatabaseNotificationCollection|DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static Builder|Signature confirmed()
 * @method static SignatureFactory factory(...$parameters)
 * @method static Builder|Signature newModelQuery()
 * @method static Builder|Signature newQuery()
 * @method static Builder|Signature pending()
 * @method static Builder|Signature query()
 * @method static Builder|Signature whereCategory($value)
 * @method static Builder|Signature whereCreatedAt($value)
 * @method static Builder|Signature whereEmail($value)
 * @method static Builder|Signature whereEmailVerifiedAt($value)
 * @method static Builder|Signature whereFirstName($value)
 * @method static Builder|Signature whereId($value)
 * @method static Builder|Signature whereInstitutionId($value)
 * @method static Builder|Signature whereLastName($value)
 * @method static Builder|Signature whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Signature extends Model implements MustVerifyEmail
{
    use HasFactory, Notifiable, VerifyEmail;

    protected $fillable = ['first_name', 'last_name', 'email', 'institution_id', 'category'];

    protected $dates = ['email_verified_at'];

    protected $casts = [
        'category' => SignatoryCategory::class,
    ];

    /**
     * Get the institution the signature is associated with.
     *
     * @return BelongsTo
     */
    public function institution(): BelongsTo
    {
        return $this->belongsTo(Institution::class);
    }

    /**
     * Get the signatory's full name formatted with the first name
     * and the first letter of the last name, followed by a period.
     *
     * @return string
     */
    public function getFullNameAttribute(): string
    {
        return $this->first_name . " " . mb_substr($this->last_name, 0, 2) . ".";
    }

    /**
     * Filter in the confirmed signatures.
     *
     * @param $query
     * @return mixed
     */
    public function scopeConfirmed($query): mixed
    {
        return $query->whereNotNull('email_verified_at')->latest();
    }

    /**
     * Filter out the confirmed signatures.
     *
     * @param $query
     * @return mixed
     */
    public function scopePending($query): mixed
    {
        return $query->whereNull('email_verified_at')->latest();
    }

    /**
     * Send the email verification notification.
     *
     * @return void
     */
    public function sendEmailVerificationNotification(): void
    {
        $this->notify(new VerifySignature($this));
    }
}
