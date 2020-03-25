<?php

use Illuminate\Database\Seeder;

class BanksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $banks = self::defaultBank();
        \App\Models\Master\Bank::insert($banks);
    }

    protected static function defaultBank()
    {
        return [
            ["name"=>"Bank Mandiri","alias"=>"Mandiri","company"=>"PT Bank Mandiri (Persero) Tbk.","code"=>'008'],
            ["name"=>"Bank BRI","alias"=>"BRI","company"=>"PT Bank Rakyat Indonesia (Persero), Tbk","code"=>'002'],
            ["name"=>"Bank BNI Syariah","alias"=>"BNI Syariah","company"=>"PT. Bank Negara Indonesia (Persero) Tbk.","code"=>'009'],
            ["name"=>"Bank CIMB Niaga","alias"=>"CIMB Niaga","company"=>"PT. Bank CIMB Niaga, Tbk.","code"=>'022'],
            ["name"=>"Panin Bank","alias"=>"Panin","company"=>"PT. Bank Panin Indonesia, Tbk.","code"=>'019'],
            ["name"=>"Permata Bank","alias"=>"Permata","company"=>"PT. Bank Permata Tbk","code"=>'013'],
            ["name"=>"Bank Danamon","alias"=>"Danamon","company"=>"PT Bank Danamon Indonesia Tbk","code"=>'011'],
            ["name"=>"Bank BII","alias"=>"BII","company"=>"PT Bank Maybank Indonesia, Tbk.","code"=>016],
            ["name"=>"Bank BTN","alias"=>"BTN","company"=>"PT Bank Tabungan Negara (Persero) Tbk","code"=>'200'],
            ["name"=>"Bank OCBC NISP","alias"=>"OCBC NISP","company"=>"PT Bank OCBC NISP Tbk","code"=>'028'],
            ["name"=>"Bank BJB","alias"=>"BJB","company"=>"Bank BJB","code"=>'110'],
            ["name"=>"Bank Mega","alias"=>"Mega","company"=>"PT. Bank Mega, Tbk.","code"=>'426'],
            ["name"=>"Bank Bukopin","alias"=>"Bukopin","company"=>"PT Bank Bukopin Tbk","code"=>'441'],
            ["name"=>"HSBC","alias"=>"HSBC","company"=>"HSBC Holdings plc","code"=>'041'],
            ["name"=>"Citibank","alias"=>"Citibank","company"=>"Citibank","code"=>031],
            ["name"=>"Bank UOB","alias"=>"UOB","company"=>"PT Bank UOB Indonesia","code"=>'023'],
            ["name"=>"BTPN","alias"=>"BTPN","company"=>"PT. Bank Tabungan Pensiunan Nasional Tbk.","code"=>'213'],
            ["name"=>"Bank Syariah Mandiri","alias"=>"Syariah Mandiri","company"=>"PT Bank Syariah Mandiri","code"=>'451'],
            ["name"=>"Standard Chartered","alias"=>"Standard Chartered","company"=>"Standard Chartered PLC","code"=>'050'],
            ["name"=>"Bank Muamalat","alias"=>"Muamalat","company"=>"PT. Bank Muamalat Indonesia Tbk.","code"=>'147'],
            ["name"=>"Bank DBS","alias"=>"DBS","company"=>"PT Bank DBS Indonesia","code"=>'046'],
            ["name"=>"Bank Kaltim","alias"=>"Bank Kaltim","company"=>"Perusahaan Daerah Bank Pembangunan Daerah Kalimantan Timur","code"=>'124'],
            ["name"=>"Bank Jatim","alias"=>"Bank Jatim","company"=>"Bank Jatim","code"=>'114'],
            ["name"=>"Bank ANZ Indonesia","alias"=>"Bank ANZ Indonesia","company"=>"PT Bank ANZ Indonesia","code"=>'061'],
            ["name"=>"Bank DKI","alias"=>"Bank DKI","company"=>"Bank Pembangunan Daerah Khusus Ibukota Jakarta","code"=>'111'],
            ["name"=>"Bank Jateng","alias"=>"Bank Jateng","company"=>"PT Bank Pembangunan Daerah Jawa Tengah","code"=>'113'],
            ["name"=>"Bank Ekonomi","alias"=>"Bank Ekonomi","company"=>"PT. Bank Ekonomi Raharja, Tbk.","code"=>'087'],
            ["name"=>"Bank Sumut","alias"=>"Bank Sumut","company"=>"PT. Bank Pembangunan Daerah Sumatera Utara","code"=>'117'],
            ["name"=>"Bank Riau Kepri","alias"=>"Bank Riau Kepri","company"=>"PT Bank Riau Kepri","code"=>'119'],
            ["name"=>"Bank Mayapada","alias"=>"Mayapada","company"=>"PT Bank Mayapada Internasional, Tbk.","code"=>'097'],
            ["name"=>"Bank Sumsel Babel","alias"=>"Bank Sumsel Babel","company"=>"PT. Bank Pembangunan Daerah Sumatera Selatan dan Bangka Belitung","code"=>'120'],
            ["name"=>"Mutiara Bank","alias"=>"Mutiara Bank","company"=>"PT Bank J Trust Indonesia Tbk","code"=>'095'],
            ["name"=>"Bank Sinarmas","alias"=>"Bank Sinarmas","company"=>"PT Bank Sinarmas Tbk","code"=>'153'],
            ["name"=>"Bank Papua","alias"=>"Bank Papua","company"=>"PT Bank Pembangunan Daerah Papua","code"=>'132'],
            ["name"=>"Bank Commonwealth","alias"=>"Commonwealth","company"=>"PT Bank Commonwealth","code"=>'950'],
            ["name"=>"Bank Nagari","alias"=>"Bank Nagari","company"=>"PT Bank Pembangunan Daerah Sumatera Barat","code"=>'118'],
            ["name"=>"Bank BRI Syariah","alias"=>"BRI Syariah","company"=>"PT. Bank BRI Syariah","code"=>'422'],
            ["name"=>"Rabobank","alias"=>"Rabobank","company"=>"PT Bank Rabobank International Indonesia","code"=>'089'],
            ["name"=>"Bank of China","alias"=>"Bank of China","company"=>"Bank of China Limited","code"=>'069'],
            ["name"=>"Bank Aceh","alias"=>"Bank Aceh","company"=>"PT Bank Pembangunan Daerah Aceh","code"=>'116'],
            ["name"=>"Bank BPD Bali","alias"=>"Bank BPD Bali","company"=>"PT. Bank Pembangunan Daerah Bali","code"=>'129'],
            ["name"=>"Bank Kalsel","alias"=>"Bank Kalsel","company"=>"PT. Bank Pembangunan Daerah Kalimantan Selatan","code"=>'122'],
            ["name"=>"Bank Kalbar","alias"=>"Bank Kalbar","company"=>"PT. Bank Pembangunan Daerah Kalimantan Barat","code"=>'123'],
            ["name"=>"Bank BNP","alias"=>"Bank BNP","company"=>"PT Bank Nusantara Parahyangan Tbk. (Bank BNP)","code"=>'145'],
            ["name"=>"Bank Mega Syariah","alias"=>"Mega Syariah","company"=>"PT. Bank Mega Syariah","code"=>'506'],
            ["name"=>"Bank Pundi","alias"=>"Pundi","company"=>"PT Bank Pundi Indonesia, Tbk.","code"=>'558'],
            ["name"=>"Bank Saudara","alias"=>"Bank Saudara","company"=>"PT Bank Himpunan Saudara 1906 Tbk","code"=>'212'],
            ["name"=>"Bank Sulselbar","alias"=>"Bank Sulselbar","company"=>"PT. Bank Pembangunan Daerah Sulawesi Selatan","code"=>'126'],
            ["name"=>"Bank Mestika","alias"=>"Bank Mestika","company"=>"PT Bank Mestika Dharma","code"=>'151'],
            ["name"=>"Bank NTT","alias"=>"Bank NTT","company"=>"PT Bank Pembangunan Daerah NTT","code"=>'130'],
            ["name"=>"Bank Sulut","alias"=>"Bank Sulut","company"=>"PT. Bank Sulut","code"=>'127'],
            ["name"=>"Bank Capital","alias"=>"Bank Capital","company"=>"PT. Bank Capital Indonesia Tbk","code"=>'054'],
            ["name"=>"Bank BPD DIY","alias"=>"Bank BPD DIY","company"=>"Bank Pembangunan Daerah Istimewa Yogyakarta","code"=>'112'],
            ["name"=>"Bank Lampung","alias"=>"Bank Lampung","company"=>"PT. Bank Pembangunan Daerah Lampung","code"=>'121'],
            ["name"=>"Bank QNB","alias"=>"Bank QNB","company"=>"Bank QNB Indonesia","code"=>'167'],
            ["name"=>"Bank Maluku","alias"=>"Bank Maluku","company"=>"PT. Bank Maluku","code"=>'131'],
            ["name"=>"Bank Index","alias"=>"Bank Index","company"=>"Bank Index Selindo","code"=>'555'],
            ["name"=>"Bank NTB","alias"=>"Bank NTB","company"=>"Bank Pembangunan Daerah Nusa Tenggara Barat","code"=>'128'],
            ["name"=>"Bank BRI Agro","alias"=>"BRI Agro","company"=>"PT. Bank BRI Agroniaga Tbk","code"=>'494'],
            ["name"=>"Bank Kalteng","alias"=>"Bank Kalteng","company"=>"Bank Pembangunan Daerah Kalimantan Tengah","code"=>'125'],
            ["name"=>"Bank Jambi","alias"=>"Bank Jambi","company"=>"Bank Pembangunan Daerah Jambi","code"=>'115'],
            ["name"=>"Bank Kesejahteraan Ekonomi","alias"=>"Bank Kesejahteraan Ekonomi","company"=>"Bank Kesejahteraan Ekonomi","code"=>'535'],
            ["name"=>"Bank Sultra","alias"=>"Bank Sultra","company"=>"Bank Pembangunan Daerah Sulawesi Tenggara","code"=>'135'],
            ["name"=>"Bank Bengkulu","alias"=>"Bank Bengkulu","company"=>"Bank Pembangunan Daerah Bengkulu","code"=>'133'],
            ["name"=>"Bank of India Indonesia","alias"=>"Bank of India Indonesia","company"=>"PT Bank of India Indonesia","code"=>'146'],
            ["name"=>"Bank Mayora","alias"=>"Bank Mayora","company"=>"PT. Bank Mayora","code"=>'553'],
            ["name"=>"Bank Ganesha","alias"=>"Ganesha","company"=>"Bank Ganesha","code"=>'161'],
            ["name"=>"Bank Ina Perdana","alias"=>"Ina Perdana","company"=>"PT. Bank Ina Perdana","code"=>'513'],
            ["name"=>"Bank Sulteng","alias"=>"Bank Sulteng","company"=>"PT Bank Pembangunan Daerah Sulawesi Tengah","code"=>'134'],
            ["name"=>"Nobu Bank","alias"=>"Nobu Bank","company"=>"PT Bank National Nobu Tbk","code"=>'503'],
            ["name"=>"Bank Artos Indonesia","alias"=>"Artos","company"=>"PT Bank Artos Indonesia","code"=>'542'],
            ["name"=>"BPR KS","alias"=>"BPR KS","company"=>"PT. BPR Karyajatnika Sadaya","code"=>'688'],
            ["name"=>"Bank ICB Bumiputera","alias"=>"ICB Bumiputera","company"=>"PT Bank MNC Internasional, Tbk","code"=>'485'],
            ["name"=>"Bank Woori Indonesia","alias"=>"Woori Indonesia","company"=>"PT. Bank Woori Saudara Indonesia 1906, Tbk","code"=>'068'],
            ["name"=>"Bank BCA","alias"=>"BCA","company"=>"PT. Bank Central Asia, Tbk.","code"=>'014'],
            ["name"=>"Bank BNI","alias"=>"BNI","company"=>"PT. Bank Negara Indonesia (Persero) Tbk","code"=>'009'],
            ["name"=>"Bank BCA Syariah","alias"=>"BCA Syariah","company"=>"PT. Bank BCA Syariah","code"=>'536'],
            ["name"=>"Bank Kotan","alias"=>"Kotan","company"=>"PT. Kotan","code"=>'200']
        ];
    }


}
