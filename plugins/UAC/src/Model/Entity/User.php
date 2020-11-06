<?php
namespace UAC\Model\Entity;

use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Cake\I18n\FrozenTime|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Cake\I18n\FrozenTime|null $created_at
 * @property \Cake\I18n\FrozenTime|null $updated_at
 * @property string $type
 * @property string|null $sid
 *
 * @property \UAC\Model\Entity\Entry[] $entries
 */
class User extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'email' => true,
        'email_verified_at' => true,
        'password' => true,
        'remember_token' => true,
        'created_at' => true,
        'updated_at' => true,
        'type' => true,
        'sid' => true,
        'entries' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password',
    ];
}
