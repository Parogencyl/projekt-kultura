@extends('layouts.nav')

@section('content')
<link href="{{ asset('css/index.css') }}" rel="stylesheet">

<section class="container mb-4 mt-5 text-justify" style="font-size: 16px;">

    <h3 class="text-center font-weight-bold mt-3"> § 1. </h3>
    <h3 class="text-center font-weight-bold mb-4"> WSTĘP </h3>
    <p>
        <b>1.</b> Platforma szkoleniowa dostępna pod adresem internetowym: www.projekt-kultura.pl
        stanowi własność Stowarzyszenia Inicjatyw Społecznych „PROJEKT KULTYRA” z siedzibą w
        Gozdnicy (Polska), ul. Ceramików 25, wpisaną do Krajowego Rejestru Sądowego: 0000860845,
        NIP: 9241916159, REGON: 387060723, adres poczty elektronicznej:
        stowarzyszenie.projektkultura@gmail.com. Stowarzyszenie zwane dalej Usługodawcą. <br>
        <b>2.</b> Niniejszy Regulamin określa zasady użytkowania platformy szkoleniowej oraz sprzedaży
        usług w postaci kursów dostępnych na Platformie szkoleniowej. <br>
        <b>3.</b> Administratorem danych osobowych przetwarzanych w związku z realizacją postanowień
        Regulaminu jest Usługodawca. Dane osobowe przetwarzane są w celach, w zakresie i w oparciu
        o zasady wskazane na stronie www.projekt-kultura.pl
    </p>
    <h3 class="text-center font-weight-bold mt-3"> § 2. </h3>
    <h3 class="text-center font-weight-bold mb-4"> DEFINICJE </h3>
    <p>
        <b>1.</b> Platforma szkoleniowa – platforma internetowa dostępna pod adresem www.projekt-
        kultura.pl , służąca do udostępniania kursów szkoleniowych i warsztatów dla zainteresowanych
        osób. <br>
        <b>2.</b> Użytkownik – każda osoba fizyczna, korzystająca z Platformy szkoleniowej. <br>
        <b>3.</b> Klient – pełnoletnia osoba fizyczna, która posiada pełną zdolność do czynności prawnych,
        osoba prawna albo jednostka organizacyjna niebędącą osobą prawną, której przepisy przyznają
        zdolność prawną, która za pośrednictwem Konta kupiła dostęp do treści szkoleniowych. <br>
        <b>4.</b> Konsument – Klient będący osobą fizyczną, który składa Zamówienie w celach
        niezwiązanych bezpośrednio z prowadzoną działalnością zawodową lub gospodarczą. <br>
        <b>5.</b> Przedsiębiorca-Konsument – Klient będący osobą fizyczną, który składa Zamówienie w
        zakresie związanym z jego działalnością gospodarczą, gdy z charakteru Zamówienia wynika, że
        nie posiada ono dla niego charakteru zawodowego, wynikającego w szczególności z przedmiotu
        wykonywanej przez niego działalności gospodarczej, udostępnionego na podstawie przepisów o
        Centralnej Ewidencji i Informacji o Działalności Gospodarczej.<br>
        <b>6.</b> Kurs - odpłatny pojedynczy kurs online dostępny na Platformie szkoleniowej.<br>
        <b>7.</b> Warsztat – odpłatny pojedynczy warsztat dostępny na Platformie szkoleniowej.<br>
        <b>8.</b> Regulamin – niniejszy regulamin Platformy szkoleniowej.<br>
        <b>9.</b> Zamówienie – czynność podejmowana przez Użytkownika, polegająca na wyborze w
        ramach Platformy szkoleniowej określonego Kursu, Warsztatu zmierzająca bezpośrednio do
        zawarcia z Usługodawcą umowy sprzedaży na warunkach wskazanych w niniejszym
        Regulaminie.<br>
        <b> 10.</b> Formularz Zamówienia – interaktywny formularz dostępny na Platformie szkoleniowej
        poprzez, który dokonywane jest Zamówienie.
    </p>
    <h3 class="text-center font-weight-bold mt-3"> § 3. </h3>

    <h3 class="text-center font-weight-bold mb-4"> POSTANOWIENIA OGÓLNE </h3>
    <p>
        <b>1.</b> Regulamin jest nieprzerwanie dostępny pod adresem www.projekt-kultura.pl w sposób
        umożliwiający każdemu Użytkownikowi jego pozyskanie, odtwarzanie i utrwalanie jego treści
        poprzez wydrukowanie lub zapisanie na nośniku w każdej chwili.
    </p>

    <h3 class="text-center font-weight-bold mt-3"> § 4. </h3>

    <h3 class="text-center font-weight-bold mb-4"> WYMAGANIA TECHNICZNE </h3>

    Do korzystania z Platformy szkoleniowej i treści szkoleniowych niezbędne jest posiadanie: <br>
    <p>
        <b>1.</b> komputera, tabletu, smartfona lub innego urządzenia elektronicznego z dostępem do
        Internetu;<br>
        <b>2.</b> dowolnej aktualnej przeglądarki internetowej (co najmniej Internet Explorer 7, Firefox 3.x,
        Safari 4.x, Google Chrome) z zainstalowaną wtyczką Adobe Flash Player;<br>
        <b>3.</b> indywidualnego konta poczty elektronicznej e-mail.
    </p>

    <h3 class="text-center font-weight-bold mt-3"> § 5. </h3>
    <h3 class="text-center font-weight-bold mb-4"> CENY I PŁATNOŚĆ </h3>

    <p>
        <b> 1.</b> Wszystkie ceny podane na Platformie szkoleniowej wyrażone są w polskich złotych
        (PLN) oraz są cenami brutto.<br>
        <b>2.</b> Płatności mogą być dokonywane wyłącznie w walucie PLN.<br>
        <b>3.</b> Cena, podana na Formularzu Zamówienia jest ceną wiążącą.<br>
        <b>4.</b> Usługodawca zastrzega sobie prawo do zmiany cen na Platformie szkoleniowej. Zmiana
        ceny produktu w żadnym przypadku nie może zostać dokonana w stosunku do Klienta, który
        złożył już Zamówienie na ten produkt. Cena podana na Platformie szkoleniowej wiąże zarówno
        Klienta, jak i Usługodawcę.<br>
        <b>5.</b> W zależności od oferowanej przez Usługodawcę opcji, zakup dostępu do Kursu odbywa
        się poprzez płatność jednorazową z czasem dostępu do Kursu. W przypadku zakupu Warsztatu,
        z którym wiąże się dostarczenie materiałów, wysyłka następuję drogą tradycyjną, w terminie
        określonym w opisie kursu.<br>
        <b>6.</b> Do każdej płatności wystawiana jest faktura według wskazania Klienta.<br>
        <b>7.</b> Klient dokonuje płatności na rachunek bankowy Usługodawcy z wykorzystaniem metod
        płatności elektronicznej dostępnych w danym czasie na Platformie szkoleniowej lub opłacając
        fakturę pro forma.<br>
        <b>8.</b> Płatności mogą być realizowane za pośrednictwem systemu Przelewy24. Dane spółki:
        PayPro SA ul. Kanclerska 15, 60-327 Poznań NIP: 779-236-98-87, Regon: 301345068 Sąd
        Rejonowy Poznań - Nowe Miasto i Wilda w Poznaniu, VIII Wydz. Gospodarczy Krajowego
        Rejestru Sądowego Nr KRS 0000347935, wysokość kapitału zakładowego: 5 476 300,00 zł,
        wpłacony w całości. Serwis Przelewy24 prowadzi system autoryzacji i rozliczeń na podstawie
        decyzji Prezesa Narodowego Banku Polskiego Nr 1/2011 z dnia 1.04.2011 r. oraz świadczy
        usługi płatnicze w charakterze krajowej instytucji płatniczej na podstawie decyzji Komisji Nadzoru
        Finansowego z dnia 10.06.2014 r., wpisanej do rejestru usług płatniczych pod numerem
        IP24/2014 (dostępnym na https://erup.knf.gov.pl/View/). Działalność PayPro SA jako Krajowej
        Instytucji Płatniczej podlega nadzorowi Urzędu Komisji Nadzoru Finansowego.<br>
        <b>9.</b> Płatności za pośrednictwem systemu Przelewy24 mogą dokonywać wyłącznie osoby
        uprawnione do posługiwania się danym instrumentem, w oparciu o który następuje realizacja
        płatności, w szczególności daną kartą płatniczą może posługiwać się wyłącznie jej uprawniony
        posiadacz.<br>
        <b>10.</b> Nieuregulowanie płatności za dostęp do treści szkoleniowych nie jest równoznaczne
        z rezygnacją z zakupu Kursu/Warsztatu. Zakup dokonany za pośrednictwem Formularza
        Zamówienia pozostaje w mocy i stanowi prawne zobowiązanie do dokonania płatności za
        zakupioną usługę.
    </p>

    <h3 class="text-center font-weight-bold mt-3"> § 6. </h3>

    <h3 class="text-center font-weight-bold mb-4"> REALIZACJA ZAMÓWIENIA </h3>

    <p>
        <b>1.</b> Użytkownik, który chce uczestniczyć w organizowanych za pośrednictwem Platformy
        formach szkoleniowych, dokonuje składa Zamówienie za pośrednictwem Formularza Zamówienia
        oraz uiszcza opłatę, przy użyciu dostępnej formy płatności.<br>
        <b>2.</b> Użytkownik może składać Zamówienia przez 24 godziny na dobę, 7 dni w tygodniu.
        <b>3.</b> Zawarcie umowy sprzedaży dostępu do Kursu/Warsztatu następuje poprzez złożenie
        przez Użytkownika Zamówienia za pomocą Formularza Zamówienia.<br>
        <b>4.</b> W Formularzu Zamówienia Użytkownik wskazuje: imię i nazwisko Klienta, adres mailowy,
        numer telefonu oraz dane niezbędne do wystawienia faktury (w tym aktualny adres na terenie
        Rzeczypospolitej Polskiej);<br>
        <b> 5.</b> Po wypełnieniu Formularza Zamówienia Użytkownik wybiera przycisk „Zakup kursu”.<br>
        <b>6.</b> Nie jest możliwe złożenie Zamówienia bez wypełnienia Formularza Zamówienia.<br>
        <b>7.</b> Zamówienie uważa się za przyjęte w momencie przesłania Klientowi informacji
        potwierdzenia przyjęcia Zamówienia przez Usługodawcę za pośrednictwem korespondencji
        elektronicznej na mail podany przy Rejestracji.<br>
        <b>8.</b> Kurs jest dostępny dla Klienta po zaksięgowaniu wpłaty na rachunku bankowym
        Usługodawcy. Dostępny jest na okres kolejnych dni, które wskazane są w opisie kursu.<br>
        <b>9.</b> Usługodawca zastrzega sobie prawo do wstrzymania lub odmowy realizacji Zamówienia
        w przypadku złożenia Zamówienia w sposób nieprawidłowy, uniemożliwiający jego realizację lub
        w razie rażącego naruszenie przez Użytkownika postanowień Regulaminu.
    </p>
    <h3 class="text-center font-weight-bold mt-3"> § 7. </h3>

    <h3 class="text-center font-weight-bold mb-4"> REKLAMACJE KURSÓW I PŁATNOŚCI </h3>
    <p>
        <b>1.</b> W przypadku ujawnienia się wad w Kursach udostępnianych za pośrednictwem Platformy
        szkoleniowej lub problemów związanych z płatnością Klient ma prawo złożenia
        reklamacji. Reklamacje należy kierować pisemnie na adres Usługodawcy lub pocztą
        elektroniczną na adres: stowarzyszenie.projektkultura@gmail.com<br>
        <b>2.</b> Reklamacja Klienta winna zawierać jego imię, e-mail, nazwę Kursu/Warsztatu, którego
        reklamacja dotyczy, opis reklamacji, przytoczenie okoliczności uzasadniających reklamację oraz
        oczekiwania Klienta wobec Usługodawcy.<br>
        <b>3.</b> Po ujawnieniu wady Kursu/Warsztatu Klient niezwłocznie, nie później jednak niż w
        terminie 14 dni od dnia ujawnienia wady, zawiadamia o jej fakcie Usługodawcę w sposób opisany
        powyżej.<br>
        <b>4.</b> Usługodawca zobowiązuje się powiadomić Klienta o terminie i sposobie rozpatrzenia
        reklamacji w terminie do 14 dni od daty jej złożenia.
    </p>
    <h3 class="text-center font-weight-bold mt-3"> § 8. </h3>
    <h3 class="text-center font-weight-bold mb-4"> ODPOWIEDZIALNOŚĆ </h3>

    <b>1.</b> Usługodawca dopełni wszelkiej należytej staranności, aby korzystanie z Platformy
    szkoleniowej przebiegało bez zakłóceń, bez usterek i niedogodności dla Użytkowników.<br>
    <b> 2.</b> Usługodawca zastrzega sobie możliwość wystąpienia krótkotrwałych przerw
    w funkcjonowaniu Platformy szkoleniowej, wynikających z niezbędnych napraw, konserwacji,
    tworzenia kopii zapasowych. W miarę możliwości, jeśli wymienione powyżej czynności nie
    wynikają z usterek, a z planowanych działań, Usługodawca zobowiązuje się informować Klientów
    o tym fakcie z podaniem przewidywanego czasu trwania braku możliwości korzystania z
    Platformy szkoleniowej.<br>
    <b>3.</b> Klient, który na skutek usterek po stronie Usługodawcy nie ma możliwości korzystania
    z Platformy szkoleniowej, zgłasza ten fakt Usługodawcy mailowo na adres:
    stowaryszenie.projektkultura@gmail.com Usługodawca niezwłocznie podejmuje wszelkie kroki,
    celem przywrócenia sprawnego funkcjonowania Platformy szkoleniowej.
    </p>
    <h3 class="text-center font-weight-bold mt-3"> § 9. </h3>
    <h3 class="text-center font-weight-bold mb-4"> PRAWA AUTORSKIE </h3>
    <p>
        <b>1.</b> Platforma szkoleniowa jest własnością Usługodawcy. Wszystkie znaki towarowe, znaki
        usług i nazwy, które są podawane na stronie, są własnością Usługodawcy lub prawo do
        posługiwania się nimi przez Usługodawcę wynika z odrębnych umów z podmiotami
        uprawnionymi. Zawarte na Platformie szkoleniowej materiały tekstowe, graficzne oraz
        rozwiązania informatyczne są chronione prawnie przepisami prawa autorskiego.<br>
        <b>2.</b> Platforma szkoleniowa, jak też poszczególne jej elementy nie mogą być modyfikowane,
        kopiowane, rozpowszechniane ani publikowane w celach komercyjnych, chyba że Usługodawca
        wyrazi na to uprzednią pisemną zgodę.<br>
        <b>3.</b> Użytkownicy nie mają prawa bez uprzedniej wyraźnej zgody Usługodawcy korzystać
        z materiałów i utworów zamieszczanych na Platformie szkoleniowej pod rygorem pełnej
        odpowiedzialności odszkodowawczej wobec Usługodawcy oraz wobec autorów poszczególnych
        utworów. Udostępnienie Kursu przez Platformę szkoleniową uznaje się za zgodę Usługodawcy
        na korzystanie z Kursu na warunkach określonych w niniejszym Regulaminie.<br>
        <b>4.</b> Materiały i zasoby, zawarte w poszczególnych Kursach, w tym w szczególności
        opracowania tekstowe, nagrania, mogą być wykorzystywane wyłącznie przez Użytkownika, który
        wykupił do nich dostęp. Użytkownik może je wykorzystywać bez pisemnej zgody Usługodawcy
        wyłącznie na użytek własny, w tym na użytek swojej firmy/organizacji, ale bez prawa do
        rozpowszechniania tych materiałów i zasobów.<br>
        <b>5.</b> Wykupienie dostępu do Kursu oznacza udzielenie przez Usługodawcę na rzecz Klienta
        licencji na wykorzystywanie Kursu przez okres kolejnych dni, określonych w opisie kursu.
        Udzielenie licencji następuje od chwili udostępnienia Kursu. Licencja uprawnia do korzystania z
        materiałów objętych ochroną prawno-autorską przez jednego Użytkownika.
    </p>
    <h3 class="text-center font-weight-bold mt-3"> § 10. </h3>
    <h3 class="text-center font-weight-bold mb-4"> ZMIANY REGULAMINU </h3>
    <p>
        <b>1.</b> Usługodawca może dokonywać zmian niniejszego Regulaminu. Zmiany mogą zostać
        wprowadzone w szczególności w celu uwzględnienia zmian w przepisach prawa, zmian funkcji
        oferowanych za pośrednictwem Platformy szkoleniowej, wprowadzenia lub wycofania usług na
        Platformie szkoleniowej, doprecyzowywania zagadnień budzących wątpliwości Użytkowników lub
        Klientów.<br>
        <b>2.</b> Zmiana postanowień Regulaminu nie może prowadzić do utraty przez Użytkownika lub
        Klienta praw nabytych, jeżeli zostały nabyte zgodnie z prawem.<br>
        <b>3.</b> Wszystkie Zamówienia przyjęte przez Platformę szkoleniową do realizacji przed dniem
        zmiany Regulaminu są realizowane na podstawie Regulaminu, który obowiązywał w dniu
        składania Zamówienia, chyba że postanowienia nowej wersji Regulaminu są bardziej korzystne.
    </p>
    <h3 class="text-center font-weight-bold mt-3"> § 11. </h3>

    <h3 class="text-center font-weight-bold mb-4"> POSTANOWIENIA KOŃCOWE </h3>
    <p>
        <b>1.</b> Klient ma możliwość skorzystania z pozasądowych sposobów rozpatrywania reklamacji
        i dochodzenia roszczeń. Zasady dostępu do tych procedur dostępne są w siedzibach lub na
        stronach internetowych podmiotów uprawnionych do pozasądowego rozpatrywania sporów.<br>
        <b>2.</b> Wszelkie spory między Usługodawcą a Użytkownikiem lub Klientem rozstrzygane będą
        przez sądy powszechne miejscowo właściwe ze względu na siedzibę Usługodawcy.
    </p>
</section>


@endsection