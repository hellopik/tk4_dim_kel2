<?php
function formatNumber($number) {
    return number_format($number, 0, '.', '.');
}
if(isset($_POST['store'])) {
    // Get the selected barang IDs
    $barang1Id = $_POST['barang1'];
    $barang2Id = $_POST['barang2'];

    // Get the selected barang objects from $daftarBarangCogs
    $barang1 = null;
    $barang2 = null;
    foreach($daftarBarangCogs as $data) {
        if($data['IdBarang'] == $barang1Id) {
            $barang1 = $data;
        }
        if($data['IdBarang'] == $barang2Id) {
            $barang2 = $data;
        }
        if($barang1 && $barang2) {
            break; // Stop the loop if both barang objects are found
        }
    }

    // Generate the calculation table
    echo '
        <div class="row">
            <div class="my-3 col">
                <label for="barang1" class="form-label">Barang 1</label>
                <input type="text" class="form-control" id="barang1" name="barang1" value="' . $barang1['NamaBarang'] . '" disabled>
            </div>
            <div class="my-3 col">
            <label for="cogsbarang1" class="form-label">COGS Barang 1</label>
            <input type="text" class="form-control" id="cogsbarang1" name="cogsbarang1" value="' . formatNumber($barang1['cogs']) . '" disabled>
            </div>
        </div>
        <div class="row">
            <div class="my-3 col">
                <label for="barang2" class="form-label">Barang 2</label>
                <input type="text" class="form-control" id="barang2" name="barang2" value="' . $barang2['NamaBarang'] . '" disabled>
            </div>
            <div class="my-3 col">
            <label for="cogsbarang2" class="form-label">COGS Barang 2</label>
            <input type="text" class="form-control" id="cogsbarang2" name="cogsbarang2" value="' . formatNumber($barang2['cogs']) . '" disabled>
            </div>
        </div>           
    <table class="table">
            <thead>
                <tr>
                    <th>Qty Barang 1</th>
                    <th>Qty Barang 2</th>
                    <th>Total Harga Paket</th>
                </tr>
            </thead>
            <tbody>';
    for($i = 1; $i <= 10; $i++) {
        $index1 = $i;
        $index2 = 10 - $i;
        $total_harga = ($index1 * $barang1['cogs']) + ($index2 * $barang2['cogs']);
        echo '<tr>
                <td>' . $index1 . '</td>
                <td>' . $index2 .'</td>
                <td>' . formatNumber($total_harga) . '</td>
            </tr>';
    }
    echo '</tbody>
        </table>';
}
?>