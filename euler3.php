<?php

$devidend = 600851475143;

echo $devidend % 97;
?>

<script type="text/javascript">
    var dividend = 600851475143;
    
    console.log(getGreatestPrimeDivisor(dividend));
    
    function getGreatestPrimeDivisor(dividend) {
        var max = Math.sqrt(dividend);
        for (var i = 3; i <= max; i+= 2) {
            if (dividend % i === 0) {
                dividend /= i;
                return getGreatestPrimeDivisor(dividend);
            }
        }
        return dividend;
    }
</script>
