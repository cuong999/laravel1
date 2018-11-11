<?php

namespace Bytesoft\Support\Services;

use Illuminate\Http\Request;

interface ProduceServiceInterface
{
    /**
     * Execute produce an entity
     *
     * @param Request $request
     * @return mixed
     * @author Bytesoft
     */
    public function execute(Request $request);
}
