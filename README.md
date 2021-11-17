# Library

#### Installation
    composer require etsetra/library

#### DateTime
    use Etsetra\Library\DateTime;
    
    echo (new DT)->nowAt();
    // 2021-09-30T00:00:00+00:00
    
    echo (new DT)->createFromFormat('d.m.Y H:i:s', '30.09.2021 00:00:00');
    // 2021-09-30T00:00:00+00:00

#### Lorem
    use Etsetra\Library\Lorem;
    
    print_r((new Lorem)->ipsum(1));
    // Tortor molestie fusce tempus sociosqu nostra tristique nisl cras. Adipiscing primis consequat tempus pellentesque aliquet. Sit interdum dictum at tincidunt eleifend cursus proin nullam sollicitudin maximus duis morbi tristique. Ipsum at mauris fringilla commodo dui class sociosqu porta enim rhoncus sodales aenean, ipsum mi at mollis commodo inceptos habitant aenean. Non mollis nisi diam.

#### Ascii Fixer
    use Etsetra\Library\Char;

    echo (new Char)->convertAscii('ĞÜŞİÖÇI...', []);

    // Options
    'delimiter' => ' ',
    'limit' => null,
    'lowercase' => false,
    'uppercase' => false,
    'replacements' => [],
    'transliterate' => false

#### Nokogiri
    // Nokogiri after character encoding errors are fixed
    // You can access the document on the Nokogiri page. https://github.com/olamedia/nokogiri

    use Etsetra\Library\Nokogiri;
