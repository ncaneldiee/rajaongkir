<?php
namespace Ncaneldiee\Rajaongkir;

class International extends Domestic
{
    /**
     * Default account type.
     *
     * @var string
     */
    protected $account_type = 'basic';

    /**
     * API version.
     *
     * @var string
     */
    protected $api_version = 'v2';

    /**
     * Courier list.
     *
     * @var array
     */
    protected $courier = [
        'basic' => [
            'pos' => 'POS Indonesia (POS)',
            'tiki' => 'Citra Van Titipan Kilat (TIKI)',
        ],
        'pro' => [
            'expedito' => 'Expedito Global Indonesia (EXPEDITO)',
            'jne' => 'Jalur Nugraha Ekakurir (JNE)',
            'slis' => 'Solusi Ekspres (SLIS)',
        ],
        'starter' => [],
    ];

    /**
     * Constructor.
     *
     * @param  string  $account_key
     * @param  string|null  $account_type
     * @return void
     */
    public function __construct($account_key, $account_type = null)
    {
        parent::__construct($account_key, $account_type);
    }

    /**
     * Get shipping cost and delivery time.
     *
     * @param  int  $origin
     * @param  int  $destination
     * @param  int|array  $shipment
     * @param  string  $courier
     * @return object
     */
    public function cost($origin, $destination, $shipment, $courier = null)
    {
        $courier = mb_strtolower($courier);

        $parameter = $this->shipment($shipment);
        $parameter['origin'] = $origin;
        $parameter['destination'] = $destination;
        $parameter['courier'] = $courier ?: implode(':', array_keys($this->courier));

        return $this->request($this->api_version . '/internationalCost', $parameter, 'POST');
    }

    /**
     * Get a list or detail of the destination country.
     *
     * @param  int|null  $id
     * @return object
     */
    public function destination($id = null)
    {
        return $this->request($this->api_version . '/internationalDestination', [
            'id' => $id,
        ]);
    }

    /**
     * Get a list or detail of the origin city.
     *
     * @param  int|null  $province
     * @param  int|null  $id
     * @return object
     */
    public function origin($province = null, $id = null)
    {
        return $this->request($this->api_version . '/internationalOrigin', [
            'province' => $province,
            'id' => $id,
        ]);
    }
}
