<?php

namespace App\Services;

use Exception;
use App\Models\Language;

class LanguageService
{
   /**
     * Fetch all the languages.
     *
     * @author Gregory Albert <gregoryalbert1209@gmail.com>
     * @since 2023-11-21
     *
     * @return array list of languages
     */
    public function getAllLanguages()
    {
        try {
            return Language::all();
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    /**
     * Fetch ID of a language from its iso code.
     *
     * @author Gregory Albert <gregoryalbert1209@gmail.com>
     * @since 2023-11-21
     *
     * @param string $isoCode Iso code of a Language.
     * @return Language id
     */
    public function getIdByIso(string $isoCode)
    {
        try {
            return Language::where('language_iso_code', $isoCode)
            ->get('language_id')
            ->first();
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    /**
     * Fetch data of a Language from its iso code.
     *
     * @author Gregory Albert <gregoryalbert1209@gmail.com>
     * @since 2023-11-21
     *
     * @param string $iso_code_2 Iso code of a Language.
     * @return Language object
     */
    public function getLanguageByisoCode(string $iso_code_2)
    {
        try {
            return Language::where('iso_code_2', $iso_code_2)->first();
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    /**
     * Fetch data of a language from its ID.
     *
     * @author Gregory Albert <gregoryalbert1209@gmail.com>
     * @since 2023-11-21
     *
     * @param integer $languageId ID of a Language.
     * @return Language object
     */
    public function getLanguageByID(int $languageId)
    {
        try {
            return Language::find($languageId)->first();
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
