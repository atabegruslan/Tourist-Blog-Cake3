<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Entry Entity
 *
 * @property int $id
 * @property string $place
 * @property string $comments
 * @property string|null $img_url
 * @property int|null $user_id
 * @property \Cake\I18n\FrozenTime $time
 *
 * @property \App\Model\Entity\User $user
 */
class Entry extends Entity
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
        'place' => true,
        'comments' => true,
        'img_url' => true,
        'user_id' => true,
        'time' => true,
        'user' => true,
    ];
}
