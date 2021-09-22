# Library

### DateTime
    use etsetra\Library\DateTime;
    
    echo (new DT)->nowAt();
    // 2021-09-30T00:00:00+00:00
    
    echo (new DT)->createFromFormat('d.m.Y H:i:s', '30.09.2021 00:00:00');
    // 2021-09-30T00:00:00+00:00
