# Library

### DateTime
    use etsetra\Library\DateTime;
    
    echo (new DT)->nowAt();
    // 2021-09-30T00:00:00+00:00
    
    echo (new DT)->createFromFormat('d.m.Y H:i:s', '30.09.2021 00:00:00');
    // 2021-09-30T00:00:00+00:00

### Lorem
    use etsetra\Library\Lorem;
    
    print_r((new Lorem)->ipsum(1));
    // Tortor molestie fusce tempus sociosqu nostra tristique nisl cras. Adipiscing primis consequat tempus pellentesque aliquet. Sit interdum dictum at tincidunt eleifend cursus proin nullam sollicitudin maximus duis morbi tristique. Ipsum at mauris fringilla commodo dui class sociosqu porta enim rhoncus sodales aenean, ipsum mi at mollis commodo inceptos habitant aenean. Non mollis nisi diam.
