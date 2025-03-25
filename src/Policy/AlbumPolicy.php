<?php
namespace App\Policy;

use App\Model\Entity\Album;
use Authorization\IdentityInterface;

class AlbumPolicy
{
    public function canIndex(IdentityInterface $user, Album $album)
    {
        return true;
    }

    public function canView(IdentityInterface $user, Album $album)
    {
        return true;
    }

    public function canAdd(IdentityInterface $user, Album $album)
    {
        return $user->role === 'admin';
    }

    public function canEdit(IdentityInterface $user, Album $album)
    {
        return $user->role === 'admin';
    }

    public function canDelete(IdentityInterface $user, Album $album)
    {
        return $user->role === 'admin';
    }
}
