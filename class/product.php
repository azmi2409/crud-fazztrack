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

    public function getProductByID($id)
    {
        $this->id = $id;
        $db = new connection;
        $sql = "SELECT * FROM produk WHERE id = ?";
        $query = $db->Query($sql, [$this->id]);
        $query = $query->fetch(PDO::FETCH_ASSOC);
        return $query;

        

    }

    public function saveProduct(array $insert)
    {
        $db = new connection;
        $this->id = $insert['id'];
        $this->nama_produk = $insert['nama_produk'];
        $this->keterangan = $insert['keterangan'];
        $this->harga = $insert['harga'];
        $this->jumlah = $insert['jumlah'];

        $sql = "UPDATE produk SET nama_produk = ?,harga = ?,jumlah = ?,keterangan = ? WHERE id = ?";
        $query = $db->Query($sql, [$this->nama_produk, $this->harga, $this->jumlah, $this->keterangan, $this->id]);
        return $query;
    }

    public function addProduct(array $insert)
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
            echo "<tr>";
            echo "<td><input type='checkbox' name='id[]' class='delete-checkbox ml-4' value=" . $data['id'] . " /></td>";
            echo "<td>" . $data['nama_produk'] . "</td>";
            echo "<td>" . $data['keterangan'] . "</td>";
            echo "<td>Rp." . $data['harga'] . "</td>";
            echo "<td>" . $data['jumlah'] . " Unit</td>";
            echo "<td><a href='product_edit.php?id=" . $data['id'] ."'>Edit</a>";
            echo "</tr>";
        }
    }
    public function goHome()
    {
        header("Location: index.php");
    }
}
?>