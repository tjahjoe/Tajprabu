<?php

namespace App\Repositories\Interfaces;

interface TagRepositoryInterface
{
    public function getAllTags();

    public function getTagByKode($kode);

    public function createTag(array $data);

    public function updateTag($id, array $data);

    public function deleteTag($id);

    public function getTrashedTags();

    public function restoreTag($id);

    public function destroyTag($id);
}