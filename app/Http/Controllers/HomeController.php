<?php

namespace App\Http\Controllers;

use App\Models\InstrumentBorrowal;
use App\Services\TraditionalMusicalInstrumentsService;
use Illuminate\Http\Request;
use TaliumAbstract\Attributes\Propertis;
use TaliumAbstract\Attributes\Ruters\Prefix;
use TaliumAbstract\Attributes\Service;
use TaliumAbstract\Attributes\StaticMethodRules;
use TaliumAbstract\Trait\CrudLib;

#[Prefix("anggota")]
#[Propertis([
    "store_redirect" => "/anggota/show"
])]
#[StaticMethodRules(InstrumentBorrowal::class)]
#[Service(TraditionalMusicalInstrumentsService::class)]
class HomeController extends Controller
{
    use CrudLib;
}
