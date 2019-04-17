<?php
    function buildBaseString($baseURI, $method, $params) {
        $r = array();
        ksort($params);
        foreach($params as $key => $value) {
            $r[] = "$key=" . rawurlencode($value);
        }
        return $method . "&" . rawurlencode($baseURI) . '&' . rawurlencode(implode('&', $r));
    }
    function buildAuthorizationHeader($oauth) {
        $r = 'Authorization: OAuth ';
        $values = array();
        foreach($oauth as $key=>$value) {
            $values[] = "$key=\"" . rawurlencode($value) . "\"";
        }
        $r .= implode(', ', $values);
        return $r;
    }
    $iconWeather = array(
        0 => "wi-tornado",
        1 => "wi-storm-showers",
        2 => "wi-hurricane",
        3 => "wi-thunderstorm",
        4 => "wi-thunderstorm",
        5 => "wi-rain-mix",
        6 => "wi-sleet",
        7 => "wi-sleet",
        8 => "wi-raindrops",
        9 => "wi-raindrops",
        10 => "wi-rain",
        11 => "wi-showers",
        12 => "wi-showers",
        13 => "wi-snow",
        14 => "wi-snow",
        15 => "wi-snow-wind",
        16 => "wi-snow",
        17 => "wi-hail",
        18 => "wi-sleet",
        19 => "wi-dust",
        20 => "wi-fog",
        21 => "wi-day-haze",
        22 => "wi-smoke",
        23 => "wi-strong-wind",
        24 => "wi-windy",
        25 => "wi-snowflake-cold",
        26 => "wi-cloudy",
        27 => "wi-night-alt-cloudy",
        28 => "wi-day-cloudy",
        29 => "wi-night-alt-partly-cloudy",
        30 => "wi-day-sunny-overcast",
        31 => "wi-night-clear",
        32 => "wi-day-sunny",
        33 => "wi-night-clear",
        34 => "wi-day-sunny",
        35 => "wi-hail",
        36 => "wi-hot",
        37 => "wi-thunderstorm",
        38 => "wi-thunderstorm",
        39 => "wi-showers",
        40 => "wi-showers",
        41 => "wi-snow",
        42 => "wi-snow",
        43 => "wi-snow",
        44 => "wi-cloud",
        45 => "wi-storm-showers",
        46 => "wi-snow",
        47 => "wi-storm-showers",
    );
    $textWeather = array(
        "tornado" => "có lốc xoáy",
        "tropical storm"=> "có bão nhiệt đới",
        "hurricane" => "có gió mạnh cấp 8",
        "severe thunderstorms" => "có giông bão nghiêm trọng",
        "thunderstorms" => "có giông bão kèm sấm sét",
        "mixed rain and snow" => "có mưa kèm tuyết rơi",
        "mixed rain and sleet" => "có mưa kèm tuyết rơi",
        "mixed snow and sleet" => "có tuyết rơi kèm mưa",
        "freezing drizzle" => "có mưa phùn lạnh",
        "drizzle" => "có mưa phùn",
        "freezing rain" => "có mưa lạnh",
        "showers" => "có mưa rào",
        "snow flurries" => "có mưa tuyết",
        "light snow showers" => "có mưa tuyết nhẹ",
        "blowing snow" => "có gió tuyết",
        "snow" => "có tuyết rơi",
        "hail" => "có mưa đá",
        "sleet" => "có mưa tuyết",
        "dust" => "thời tiết có nhiều bụi",
        "foggy" => "có sương mù",
        "haze" => "có sương mù vào sáng sớm",
        "smoky" => "thời tiết có nhiều khói",
        "blustery" => "thời tiết ảm đạm",
        "windy" => "có nhiều gió",
        "cold" => "thời tiết lạnh giá",
        "cloudy" => "có nhiều mây",
        "mostly cloudy (night)" => "ban đêm nhiều mây",
        "mostly cloudy (day)" => "ban ngày nhiều mây",
        "partly cloudy (night)" => "ban đêm ít mây",
        "partly cloudy (day)" => "ban ngày ít mây",
        "clear (night)" => "ban đêm không mây",
        "sunny" => "có nắng",
        "fair (night)" => "ban đêm thời tiết tốt",
        "fair (day)" => "ban ngày thời tiết tốt",
        "mixed rain and hail" => "có mưa kèm mưa đá",
        "hot" => "thời tiết nắng nóng",
        "isolated thunderstorms" => "có giông bão một vài nơi",
        "scattered thunderstorms" => "có giông bão rải rác",
        "scattered showers" => "có mưa rào rải rác",
        "heavy snow" => "có tuyết rơi nhiều",
        "scattered snow showers" => "có mưa tuyết rải rác",
        "partly cloudy" => "trời ít mây",
        "mostly cloudy" => "trời nhiều mây",
        "thundershowers" => "có mưa dông",
        "snow showers" => "có mưa tuyết",
        "isolated thundershowers" => "có mưa dông một vài nơi",
        "breezy" => "có gió nhẹ",
        "rain" => "có mưa",
    );
    $day = array(
        "Mon" => "Thứ 2",
        "Tue" => "Thứ 3",
        "Wed" => "Thứ 4",
        "Thu" => "Thứ 5",
        "Fri" => "Thứ 6",
        "Sat" => "Thứ 7",
        "Sun" => "Chủ Nhật",
    );
    $url = 'https://weather-ydn-yql.media.yahoo.com/forecastrss';
    $app_id = 'x8FTNJ3c';
    $consumer_key = 'dj0yJmk9cVVvUVgybW9MUlhNJnM9Y29uc3VtZXJzZWNyZXQmc3Y9MCZ4PTNh';
    $consumer_secret = 'b365f7613a6ee17d85d7e1485ad75859394d9f21';
?>