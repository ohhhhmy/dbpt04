<?php
  $link = mysqli_connect('localhost', 'root', 'gees00409', 'dbpfinal');
  $rentplace = mysqli_real_escape_string($link, $_POST['search']);

  $query = "select hourlyuse.renttime, sum(hourlyuse.usage) as s, rentalshops.rentalshop from hourlyuse join rentalshops on hourlyuse.rentplace = rentalshops.rentplace where rentalshops.rentalshop like '%{$rentplace}%' group by hourlyuse.renttime, rentalshops.rentalshop order by rentalshops.rentalshop, hourlyuse.renttime, s limit 300";
  $rows = mysqli_query($link, $query);
  $hourlyResult = '';
  $num = 0;
  while ($row = mysqli_fetch_assoc($rows)) {
      $hourlyResult .= '<tr>';
      $hourlyResult .= '<td>'.$row['rentalshop'].'</td>';
      $hourlyResult .= '<td>'.$row['renttime'].'</td>';
      $hourlyResult .= '<td>'.$row['s'].'</td>';
      $hourlyResult .= '</tr>';
  }

  if ($rows == false) {
      echo '조회 과정에서 문제가 발생했습니다. 관리자에게 문의하세요.';
      echo "<a href='main.php'> 돌아가기 </a>";
      error_log(mysqli_error($link));
  }

?>
<html>
  <head>
      <meta charset="utf-8">
      <title> 시간대 별 이용 복잡도 </title>
  </head>
  <body>
    <h3> 검색하신 "<?=$rentplace ?>" 장소의 시간대 별 최소 이용정보입니다. </h3>
    <table border=1>
      <tr>
          <th> 대여소명 </th>
          <th> 시간 </th>
          <th> 이용건수 </th>
      </tr>
      <?= $hourlyResult ?>
    </table>
    * 시간과 이용건수: 해당 시간부터 1시간 내 대여 건수의 합입니다.
  </body>

</html>
