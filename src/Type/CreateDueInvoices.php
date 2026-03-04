<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Type;

use MarcusJaschen\Collmex\Type\Validator\Date as DateValidator;

/**
 * Collmex Create Due Invoices Type.
 *
 * @see https://www.collmex.de/c.cmx?1005,1,help,api_Abrechnungslauf
 *
 * @property mixed $type_identifier
 * @property mixed $client_id Interne Nummer der Firma, wie unter Verwaltung → Firma anzeigen und ändern
 * @property mixed $invoice_date Optional. Falls nicht angegeben, wird das aktuelle Datum verwendet.
 * @property mixed $order Es werden alle lieferrelevanten Auftragspositionen abgerechnet, deren gelieferte Menge
 *                        größer als die bereits abgerechnete Menge ist. Auftragspositionen für Produkte mit
 *                        Kennzeichen Direktlieferung werden abgerechnet, wenn der Liefertermin der verknüpften
 *                        Lieferantenauftragsposition erreicht ist oder wenn im Lieferantenauftrag das Kennzeichen
 *                        'Endgeliefert' gesetzt ist. Sind für den Auftrag Teilrechnungen erlaubt, werden auch
 *                        Rechnungen für noch nicht komplett belieferte Aufträge angelegt. Nur Collmex pro: Es werden
 *                        keine Rechnungen für Kunden angelegt, die das Kennzeichen 'Sammelrechnung' im Reiter 'Verkauf'
 *                        gesetzt haben. Um Sammelrechnungen anzulegen, nutzen Sie die Funtkion Sammelrechnung anlegen.
 * @property mixed $due_since Die Rechnungen für belieferte Aufträge werden erst eine bestimmte Anzahl von Tagen nach
 *                            erfolgter Lieferung angelegt, d.h. die Differenz aus Rechnungsdatum und Lieferdatum muss
 *                            größer oder gleich der hier eingegebenen Anzahl von Tagen sein.
 * @property mixed $employee_id Rechnungen für belieferte Aufträge werden nur für Kundenaufträge des eingegebenen
 *                              Bearbeiters angelegt.
 * @property mixed $require_shipping_booked Rechnungen für belieferte Aufträge werden nur angelegt, wenn für die
 *                                          Lieferung der Warenausgang gebucht ist. Nutzen Sie diese Option, wenn
 *                                          zwischen dem Anlegen der Lieferung und dem tatsächlichen Warenausgang eine
 *                                          größere Zeitspanne liegt.
 * @property mixed $periodic_invoices Es werden periodische Rechnungen abgerechnet, bei denen das Feld
 *                                    Kunde → Verkauf → Periodische Rechnung → Nächste Rechnung früher oder gleich dem
 *                                    Rechnungsdatum ist. Sind mehrere Positionen für einen Kunden zur Abrechnung
 *                                    fällig, werden diese zusammen in einer Rechnung abgerechnet. Nach dem Anlegen der
 *                                    Rechnung wird das Feld „nächste Rechnung“ um ein Intervall in die Zukunft gesetzt.
 *                                    Für eine detaillierte Beschreibung der periodischen Rechnung siehe Kunde → Verkauf
 * @property mixed $project Es werden alle Projekte abgerechnet, für welche in dem angegebenen Zeitraum
 *                          rechnungsrelevante Tätigkeiten erfasst wurden.
 * @property mixed $due_in Zur Abrechnung von periodischen Rechnungen in der Zukunft. Die Rechnung wird angelegt, wenn
 *                         das nächste Rechnungsdatum abzüglich der hier eingegebenen Anzahl Tage früher oder gleich
 *                         dem Rechnungsdatum ist.
 * @property mixed $date_from
 * @property mixed $date_to
 * @property mixed $send_emails 1 = Für Kunden mit Ausgabemedium E-Mail werden die Rechnungen direkt per Mail versendet.
 *                              Tritt beim Versand einer Rechnung ein Fehler auf, fährt das System mit der nächsten
 *                              Rechnung fort, d. h. es werden so viele Rechnungen wie möglich ausgegeben. Nicht
 *                              ausgegebene Rechnungen können nachträglich mit der Sammelausgabe versendet werden.
 */
class CreateDueInvoices extends AbstractType implements TypeInterface
{
    /**
     * @var array
     */
    protected $template = [
        'type_identifier' => 'CREATE_DUE_INVOICES',
        'client_id' => null,
        'invoice_date' => null,
        'order' => null,
        // 5
        'due_since' => null,
        'employee_id' => null,
        'require_shipping_booked' => null,
        'periodic_invoices' => null,
        'project' => null,
        // 10
        'due_in' => null,
        'date_from' => null,
        'date_to' => null,
        'send_emails' => null,
    ];

    /**
     * Formally validates the type data in $data attribute.
     *
     * @return bool Validation success
     */
    #[\Override]
    public function validate(): bool
    {
        return true;
    }
}
