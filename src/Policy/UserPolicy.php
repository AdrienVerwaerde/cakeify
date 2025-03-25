<?php
namespace App\Policy;

use App\Model\Entity\User;
use Authorization\IdentityInterface;

class UserPolicy
{
    public function canIndex(IdentityInterface $user, User $target)
    {
        return $user->role === 'admin';
    }

    public function canView(IdentityInterface $user, User $target)
    {
        return $user->id === $target->id || $user->role === 'admin';
    }

    public function canAdd(IdentityInterface $user, User $target)
    {
        return $user->role === 'admin';
    }

    public function canEdit(IdentityInterface $user, User $target)
    {
        return $user->role === 'admin';
    }

    public function canDelete(IdentityInterface $user, User $target)
    {
        return $user->role === 'admin';
    }
}
