<?php

class product
{
    public function deleteProduct($id)
    {
        $db = new connection;
        $this->id = $id;
        $sql = "DELETE FROM produk WHERE id = ?";
        $db->Query($sql, [$this->id]);
        return $this->goHome();
    }

    public function getAll()
    {
        $db = new connection;
        $sql = "SELECT * FROM produk";
        $query = $db->Query($sql);
        return $query;
    }

    public function saveProduct(array $insert)
    {
        $db = new connection;
        $this->nama_produk = $insert['nama_produk'];
        $this->keterangan = $insert['keterangan'];
        $this->harga = $insert['harga'];
        $this->jumlah = $insert['jumlah'];

        $sql = "INSERT INTO produk (nama_produk,harga,jumlah,keterangan) VALUES (?,?,?,?)";
        $query = $db->Query($sql, [$this->nama_produk, $this->harga, $this->jumlah, $this->keterangan]);
        return $query;
    }

    public function getProduct()
    {
        $sql = $this->getAll();
        $rows = $sql->fetchAll(PDO::FETCH_ASSOC);
        foreach ($rows as $data) {
            echo "<div class='col-sm-3 pb-3'>";
            echo "<div class='card border-dark rounded'>";
            echo "<div class='card-body text-center'>";
            echo "<input type='checkbox' name='id[]' class='delete-checkbox float-left' value=" . $data['id'] . " />";
            echo "<p>Nama: " . $data['nama_produk'] . "</p>";
            echo "<p>Ket: " . $data['keterangan'] . "</p>";
            echo "<p>Harga: Rp." . $data['harga'] . "</p>";
            echo "<p>Jumlah: " . $data['jumlah'] . "</p>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }
    }
    public function goHome()
    {
        header("Location: index.php");
    }
}
?>