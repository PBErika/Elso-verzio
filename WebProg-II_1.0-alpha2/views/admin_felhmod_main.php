<h2>Regisztrált felhasználók</h2>
<table>
  <thead>
    <tr>
      <th>ID</th><th>Név</th><th>Felhasználónév</th><th>Jogosultság</th><th>módosítás / törlés</th>
    </tr>
  </thead>
  <tbody>
<?= (isset($viewData['uzenet']) ? $viewData['uzenet'] : "") ?>
  </tbody>
</table>
