# Příspěvkové fórum
Pracujete na localhostu, veškeré soubory s kódy i obrázky, i sql soubor s příkazy (pokud využíváte)
uložte do jednoho adresáře. Po skončení práce tuto složku zkopírujte na plochu, složka bude mít
vaše příjmení jako název!
## Popis
Vytvořte kompletní webovou stránku. Všechny stránky budou mít stejnou strukturu – hlavička, tělo,
patička, menu (rozložení je na vás). Je vyžadována grafická úprava webu (máte k dispozici Inkscape).
## Komponenty aplikace
### Přihlášení a registrace
Při registraci zadává uživatel pole Jméno, Příjmení, Username, Heslo, Kontrola hesla, Email, Kontrolní
otázka, Odpověď na kontrolní otázku, Poznámka z čehož pouze poznámka je nepovinná. Nelze
provést registraci bez vyplněných povinných polí. Email a Username musí být v databázi unikátní.
Validace probíhá na klientu před odesláním na server.
Přihlášení probíhá pomocí emailu a hesla. V případě nekorektního přihlášení se objeví možnost
„Zapomenuté heslo“, kde uživatel může pro vytvoření nového hesla zadat odpověď na svou kontrolní
otázku. Po přihlášení bude uživatel přesměrován na hlavní stránku.
### Fórum
Na hlavní straně se nachází výpis příspěvků. Každý příspěvek bude graficky oddělen a bude u jeho
nadpisu zobrazen i autor, datum a čas vložení, počet komentářů. Příspěvky lze řadit podle data
přidání, abecedně dle názvu nebo podle počtu komentářů. Nový příspěvek se vkládá přímo na hlavní
stránce pomocí formuláře pro přidání příspěvku. Formulář bude obsahovat pouze dvě vstupní pole ->
Nadpis a Text. I neregistrovaný uživatel může přidávat příspěvky, místo jména pak bude napsáno
„Neregistrovaný uživatel“. Příspěvek se dá otevřít a následně komentovat pomocí formuláře pro
přidání komentáře. Formulář bude obsahovat pouze vstupní pole pro text. Pro neregistrované
uživatele platí stejné podmínky jako v případě přidávání příspěvků. Komentáře budou graficky
oddělené a budou obsahovat autora a text komentáře. Ošetřete, aby do vstupních polí nebylo možné
vkládat HTML tagy. Přihlášený uživatel může mazat své příspěvky a komentáře.
### Administrace
Staticky v databázi určete administrátora, který bude mít možnost mazat všechny příspěvky a
komentáře (tlačítkem u příspěvku/komentáře).