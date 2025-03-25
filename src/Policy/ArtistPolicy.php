<?php
namespace App\Policy;

use App\Model\Entity\Artist;
use Authorization\IdentityInterface;

class ArtistPolicy
{
    public function canIndex(IdentityInterface $user, Artist $artist)
    {
        return true;
    }

    public function canView(IdentityInterface $user, Artist $artist)
    {
        return true;
    }

    public function canAdd(IdentityInterface $user, Artist $artist)
    {
        return $user->role === 'admin';
    }

    public function canEdit(IdentityInterface $user, Artist $artist)
    {
        return $user->role === 'admin';
    }

    public function canDelete(IdentityInterface $user, Artist $artist)
    {
        return $user->role === 'admin';
    }
}
