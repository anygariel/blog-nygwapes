<?php


class Database {
    private $file;

    public function __construct($filename) {
        $this->file = $filename;

        // Buat file jika belum ada
        if (!file_exists($this->file)) {
            file_put_contents($this->file, json_encode([]));
        }
    }

    public function readAll() {
        $data = json_decode(file_get_contents($this->file), true);
        return $data ?? [];
    }

    public function writeAll($data) {
        file_put_contents($this->file, json_encode($data, JSON_PRETTY_PRINT));
    }

    public function insert($newData) {
        $data = $this->readAll();
        $newData['id'] = uniqid(); // ID unik
        $data[] = $newData;
        $this->writeAll($data);
        return $newData;
    }

    public function find($id) {
        $data = $this->readAll();
        foreach ($data as $item) {
            if ($item['id'] === $id) {
                return $item;
            }
        }
        return null;
    }
    public function findWaktu($datenow) {
        $data = $this->readAll();
        foreach ($data as $item) {
            if($item['waktu'] == $datenow){
                return $item;
            }
        }
        return null;
    }
    public function findWaktuMonth($datenow) {
        $data = $this->readAll();
        foreach ($data as $item) {
            if($item['waktu'] == $datenow){
                return $item;
            }
        }
        return null;
    }
    public function findWaktuYears($datenow) {
        $data = $this->readAll();
        foreach ($data as $item) {
            if($item['waktu'] == $datenow){
                return $item;
            }
        }
        return null;
    }
    public function updateWaktu($datenow, $newData) {
        $data = $this->readAll();
        foreach ($data as &$item) {
            if ($item['waktu'] === $datenow) {
                $item = array_merge($item, $newData);
                break;
            }
        }
        $this->writeAll($data);
    }
    public function updateMonth($datenow, $newData) {
        $data = $this->readAll();
        foreach ($data as &$item) {
            if ($item['waktu'] === $datenow) {
                $item = array_merge($item, $newData);
                break;
            }
        }
        $this->writeAll($data);
    }
    public function updateYears($datenow, $newData) {
        $data = $this->readAll();
        foreach ($data as &$item) {
            if ($item['waktu'] === $datenow) {
                $item = array_merge($item, $newData);
                break;
            }
        }
        $this->writeAll($data);
    }
    public function delete($id) {
        $data = $this->readAll();
        $data = array_filter($data, fn($item) => $item['id'] !== $id);
        $this->writeAll(array_values($data));
    }

    public function update($id, $newData) {
        $data = $this->readAll();
        foreach ($data as &$item) {
            if ($item['id'] === $id) {
                $item = array_merge($item, $newData);
                break;
            }
        }
        $this->writeAll($data);
    }
    public function updateidposts($id, $newData) {
        $data = $this->readAll();
        foreach ($data as &$item) {
            if ($item['idposts'] === $id) {
                $item = array_merge($item, $newData);
                break;
            }
        }
        $this->writeAll($data);
    }
}


function createHashtag($string) {
    // Convert to lowercase
    $slug = strtolower($string);

    // Remove special characters
    $slug = preg_replace('/[^a-z0-9\s]/', '', $slug);

    // Replace spaces with hyphens
    $slug = str_replace(' ', ' #', $slug);

    // Trim leading and trailing hyphens
    $slug = trim($slug, ' #');

    return $slug;
}
function createSlug($string) {
    // Convert to lowercase
    $slug = strtolower($string);

    // Remove special characters
    $slug = preg_replace('/[^a-z0-9\s]/', '', $slug);

    // Replace spaces with hyphens
    $slug = str_replace(' ', '-', $slug);

    // Trim leading and trailing hyphens
    $slug = trim($slug, '-');

    return $slug;
}