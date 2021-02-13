

@ component ( 'mail :: layout' )
    { { - Header - } }
    @ slot ( 'header' )
        @ component ( 'mail :: header' , [ 'url' => config ( 'app.url' ) ] ) Titolo
            intestazione
        @ endcomponent
    @ endlot

{ { - Body - } }
    Questo è il nostro messaggio principale { { $ user } }

{{ - Subcopy - } }
    @ isset ( $ subcopy )
        @ fessura ( 'subcopy' )
            @ componente ( 'mail :: subcopy' )
                { { $ subcopy } }
            @ endcomponent
        @ endslot
    @ endisset

{ { - Footer - } }
    @ slot ( 'footer' )
        @ component ( 'mail :: footer' )
            © {{ date ( 'Y' ) } } { { config ( 'app.name' ) } } . Super FOOTER !
        @ endcomponent
    @ endcomponent
@ endcomponent

