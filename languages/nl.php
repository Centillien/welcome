<?php
/**
 * Elgg welcome plugin nl language
 *
 * @author Gerard Kanters
 * @author Wouter van Os
 * @author Juho Jaakkola
 *
 * @website https://www.elgg.com
 *
 * @copyright Elgg 2016
 */

$dutch = array(
        'welcome' => 'Welkom',
        'welcome:title' => 'U bent er bijna!',
        'welcome:text' => '<p>Welkom %s, u hebt succesvol geregistreerd bij  %s.</p>
<p>Voordat u in kunt loggen, moet u uw account valideren. We hebben een email gestuurd met een activatie link daarin naar <strong>%s</strong>. Controleer nu uw inbox en klik op deze link om in te kunnen loggen.<p>
<p>Als u geen email in uw inbox ziet, controleer dan uw spam folder of speciale tab voor sociale netwerken.</p>',
        'welcome:wrongemail' =>  '<p>Welkom %s, de registratie van uw account op %s kan niet worden voltooid. </p> Het lijkt er namelijk op dat u een foutief email adres hebt ingegeven. Controle op internet geeft aan dat het email adres <strong>%s</strong> niet bereikbaar is. U kunt het adres corrigeren met de button boven aan de pagina. ',

        'welcome:changeemail' => 'Verander email',
        'welcome:changeemailtext' => '<p>Mocht u per ongeluk het verkeerde email adres hebben ingegeven, kunt u dit eenmalig verandere met de <strong>button</strong> hierboven</p>',
        'welcome:changeemailcontact' => '<p>Heeft u nog steeds geen email ontvangen of u denkt dat wij een fout hebben gemaakt bij de controle neem dan  <a href="/mod/contact">contact</a> op</p>',
        'welcome:no_user_guid_provided' => 'User-GUID not ingegeven.',
        'welcome:user_email_changed_to' => 'Email addres van gebruiker %s is veranderd in %s.',
        'welcome:email_address_invalid' => 'Opgegeven email adres %s is ongelding.',
        'welcome:user_email_not_changed' => 'Email adres van user %s kon niet worden veranderd',
        'welcome:new_user_email' => 'Geef het nieuwe email adres op voor  %s: ',
        'welcome:change_email' => 'Verander email',
	'welcome:welcome_adwords'  => 'Als je adwords gebruikt en conversie wilt meten, geef de snippet hieronder in.',

);

add_translation('nl', $dutch);

