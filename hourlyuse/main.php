<?php
  header("Content-Type: text/html; charset=UTF-8");
?>
<html>
  <head>
      <meta charset="utf-8">
      <title> 시간대 별 이용 복잡도 </title>
  </head>
  <body>
    <h3> 이용하실 시간과 장소를 선택해주세요. </h3>
    <form action="byplaceUsage.php" method="POST">
      <select name="time">
        <option value="0"> 현재 시간 </option>
        <option value="1"> 1시 </option>
        <option value="2"> 2시 </option>
        <option value="3"> 3시 </option>
        <option value="4"> 4시 </option>
        <option value="5"> 5시 </option>
        <option value="6"> 6시 </option>
        <option value="7"> 7시 </option>
        <option value="8"> 8시 </option>
        <option value="9"> 9시 </option>
        <option value="10"> 10시 </option>
        <option value="11"> 11시 </option>
        <option value="12"> 12시 </option>
        <option value="13"> 13시 </option>
        <option value="14"> 14시 </option>
        <option value="15"> 15시 </option>
        <option value="16"> 16시 </option>
        <option value="17"> 17시 </option>
        <option value="18"> 18시 </option>
        <option value="19"> 19시 </option>
        <option value="20"> 20시 </option>
        <option value="21"> 21시 </option>
        <option value="22"> 22시 </option>
        <option value="23"> 23시 </option>
      </select>
      <select name="place">
        <option value="강남구"> 강남구 </option>
        <option value="강동구"> 강동구 </option>
        <option value="강북구"> 강북구 </option>
        <option value="강서구"> 강서구 </option>
        <option value="관악구"> 관악구 </option>
        <option value="광진구"> 광진구 </option>
        <option value="구로구"> 구로구 </option>
        <option value="금천구"> 금천구 </option>
        <option value="노원구"> 노원구 </option>
        <option value="도봉구"> 도봉구 </option>
        <option value="동대문구"> 동대문구 </option>
        <option value="동작구"> 동작구 </option>
        <option value="마포구"> 마포구 </option>
        <option value="서대문구"> 서대문구 </option>
        <option value="서초구"> 서초구 </option>
        <option value="성동구"> 성동구 </option>
        <option value="성북구"> 성북구 </option>
        <option value="송파구"> 송파구 </option>
        <option value="양천구"> 양천구 </option>
        <option value="영등포구"> 영등포구 </option>
        <option value="용산구"> 용산구 </option>
        <option value="은평구"> 은평구 </option>
        <option value="종로구"> 종로구 </option>
        <option value="중구"> 중구 </option>
        <option value="중랑구"> 중랑구 </option>
      </select>
      <input type="submit" value="조회">
    </form>

    <h3> 연령대 별 복잡도 정보를 제공합니다. </h3>
    <form action="byageUsage.php" method="POST">
      <select name="age">
        <option value="~10대"> ~10대 </option>
        <option value="20대"> 20대 </option>
        <option value="30대"> 30대 </option>
        <option value="40대"> 40대 </option>
        <option value="50대"> 50대 </option>
        <option value="60대"> 60대 </option>
        <option value="70대"> 70대~ </option>
      </select>
      <select name="place">
        <option value="강남구"> 강남구 </option>
        <option value="강동구"> 강동구 </option>
        <option value="강북구"> 강북구 </option>
        <option value="강서구"> 강서구 </option>
        <option value="관악구"> 관악구 </option>
        <option value="광진구"> 광진구 </option>
        <option value="구로구"> 구로구 </option>
        <option value="금천구"> 금천구 </option>
        <option value="노원구"> 노원구 </option>
        <option value="도봉구"> 도봉구 </option>
        <option value="동대문구"> 동대문구 </option>
        <option value="동작구"> 동작구 </option>
        <option value="마포구"> 마포구 </option>
        <option value="서대문구"> 서대문구 </option>
        <option value="서초구"> 서초구 </option>
        <option value="성동구"> 성동구 </option>
        <option value="성북구"> 성북구 </option>
        <option value="송파구"> 송파구 </option>
        <option value="양천구"> 양천구 </option>
        <option value="영등포구"> 영등포구 </option>
        <option value="용산구"> 용산구 </option>
        <option value="은평구"> 은평구 </option>
        <option value="종로구"> 종로구 </option>
        <option value="중구"> 중구 </option>
        <option value="중랑구"> 중랑구 </option>
      </select>
      <input type="submit" value="조회">
    </form>
    <h3> 장소를 검색해보세요. 이용건수가 많은 상위 10개 대여소 정보를 알려드립니다. </h3>
    <form action="search.php" method="POST">
      <input type="text" name = "search" placeholder="대여소번호, 대여소명 등">
      <br>
      <br>
      <input type="submit" value="검색">
    </form>
  </body>
</html>
