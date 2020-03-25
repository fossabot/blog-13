<?php

namespace App\Models\Users;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Bank
 *
 * @package App\Models\Users
 * @property int $id
 * @property int $user_id
 * @property int $bank_id
 * @property int $primary
 * @property string $branch_name
 * @property string $branch_code
 * @property string $account_holder
 * @property string $account_number
 * @property string $label
 * @property string $note
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Master\Bank $bank
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\Bank newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\Bank newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\Bank query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\Bank whereAccountHolder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\Bank whereAccountNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\Bank whereBankId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\Bank whereBranchCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\Bank whereBranchName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\Bank whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\Bank whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\Bank whereLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\Bank whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\Bank wherePrimary($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\Bank whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Users\Bank whereUserId($value)
 * @mixin \Eloquent
 */
class Bank extends Model
{
    /**
     * @var string
     */
    protected $table = 'users_banks';

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return  $this->belongsTo(User::class, 'user_id');
    }

    /**
     * @return BelongsTo
     */
    public function bank(): BelongsTo
    {
        return  $this->belongsTo(\App\Models\Master\Bank::class, 'bank_id');
    }
}
