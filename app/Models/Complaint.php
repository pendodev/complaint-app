<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    use HasFactory;

    const TYPE_FEE       = 'fee';
    const TYPE_SERVICE   = 'service';
    const TYPE_TURN_TIME = 'turn-time';
    const TYPE_LATE      = 'late';
    const TYPE_APPRAISER = 'appraiser';
    const TYPE_STAFF     = 'staff';
    const TYPES          = [
        self::TYPE_FEE,
        self::TYPE_SERVICE,
        self::TYPE_TURN_TIME,
        self::TYPE_LATE,
        self::TYPE_APPRAISER,
        self::TYPE_STAFF,
    ];

    const PERSON_BORROWER = 'borrower';
    const PERSON_CLIENT   = 'client';
    const PERSONS         = [
        self::PERSON_BORROWER,
        self::PERSON_CLIENT,
    ];

    const JOB_PROCESSOR   = 'processor';
    const JOB_LO          = 'lo';
    const JOB_UNDERWRITER = 'underwriter';
    const JOB_MANAGEMENT  = 'management';
    const JOB_BORROWER    = 'borrower';
    const JOBS            = [
        self::JOB_PROCESSOR,
        self::JOB_LO,
        self::JOB_UNDERWRITER,
        self::JOB_MANAGEMENT,
        self::JOB_BORROWER,
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'date',
        'client_name',
        'type',
        'person',
        'job_title',
        'author',
        'message',
        'user_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'user',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
    ];

    protected $dates = [
        'date',
        'created_at',
        'updated_at',
    ];

    protected $appends = [
        'submitted_by',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function setDateAttribute($value)
    {
        $this->attributes['date'] = Carbon::createFromTimestamp(strtotime($value));
    }

    public function getJobTitleAttribute($value)
    {
        if (strlen($value) <= 3) {
            return strtoupper($value);
        }
        return ucfirst($value);
    }

    public function getTypeAttribute($value)
    {
        if (strlen($value) <= 2) {
            return strtoupper($value);
        }
        return ucfirst($value);
    }

    public function getPersonAttribute($value)
    {
        if (strlen($value) <= 3) {
            return strtoupper($value);
        }
        return ucfirst($value);
    }

    public function getSubmittedByAttribute()
    {
        return $this->user->name;
    }

    public static function getTypes()
    {
        $types = [];
        $self = new static;
        foreach (self::TYPES as $type) {
            $types[$type] = $self->getTypeAttribute($type);
        }
        return $types;
    }

    public static function getJobs()
    {
        $jobs = [];
        $self = new static;
        foreach (self::JOBS as $job) {
            $jobs[$job] = $self->getJobTitleAttribute($job);
        }
        return $jobs;
    }

    public static function getPersons()
    {
        $persons = [];
        $self = new static;
        foreach (self::PERSONS as $person) {
            $persons[$person] = $self->getPersonAttribute($person);
        }
        return $persons;
    }
}
