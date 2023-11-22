<?php

namespace App\Http\Controllers;

use App\Services\LanguageService;
use Exception;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    private $languageService;

    /**
     * Create a new controller instance.
     *
     * @author Gregory Albert <gregoryalbert1209@gmail.com>
     * @since 2023-11-21
     *
     * @param LanguageService $languageService The instance of LanguageService class.
     * @return void
     */
    public function __construct(LanguageService $languageService)
    {
        $this->languageService = $languageService;
    }

     /**
     * Display a listing of all the countries.
     *
     * @author Gregory Albert <gregoryalbert1209@gmail.com>
     * @since 2023-11-21
     *
     * @return \Illuminate\Http\Response
     */
    public function indexAll()
    {
        try {
            return successResponse($this->languageService->getAllLanguages());
        } catch (Exception $e) {
            return errorResponse(
                Response::HTTP_INTERNAL_SERVER_ERROR,
                ERROR_CODE['GENERIC_ERROR'],
                $e->getMessage()
            );
        }
    }

    /**
     * Send the ID of a language taking its iso code.
     *
     * @author Gregory Albert <gregoryalbert1209@gmail.com>
     * @since 2023-11-21
     *
     * @return \Illuminate\Http\Response
     */
    public function getId()
    {
        try {
            return successResponse($this->languageService->getIdByIso(app('translator')->getLocale()));
        } catch (Exception $e) {
            return errorResponse(
                Response::HTTP_INTERNAL_SERVER_ERROR,
                ERROR_CODE['GENERIC_ERROR'],
                $e->getMessage()
            );
        }
    }

    /**
     * Send the data of a language taking its ID.
     *
     * @author Gregory Albert <gregoryalbert1209@gmail.com>
     * @since 2023-11-21
     *
     * @param string $languageId ID of a language.
     * @return \Illuminate\Http\Response
     */
    public function index(string $languageId)
    {
        try {
            return successResponse($this->languageService->getLanguageById($languageId));
        } catch (Exception $e) {
            return errorResponse(
                Response::HTTP_INTERNAL_SERVER_ERROR,
                ERROR_CODE['GENERIC_ERROR'],
                $e->getMessage()
            );
        }
    }
}
