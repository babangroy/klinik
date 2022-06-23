var keyword = document.getElementById('Crirm');
var keyword2 = document.getElementById('tanggal');
var tampil = document.getElementById('tabeldata');

keyword.addEventListener('keyup', function () {
  var cari = new XMLHttpRequest();
  cari.onreadystatechange = function () {
    if (cari.readyState == 4 && cari.status == 200) {
      tampil.innerHTML = cari.responseText;
    }
  };

  cari.open('GET', 'datapasien.php?keyword=' + keyword.value, true);
  cari.send();
});

keyword2.addEventListener('input', function () {
  var cari2 = new XMLHttpRequest();
  cari2.onreadystatechange = function () {
    if (cari2.readyState == 4 && cari2.status == 200) {
      tampil.innerHTML = cari2.responseText;
    }
  };

  cari2.open('GET', 'datadaritanggal.php?keyword=' + keyword2.value, true);
  cari2.send();
});
