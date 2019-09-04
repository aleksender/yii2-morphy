<?php

namespace aleksender\morphy;


use phpMorphy_GrammemsProvider_GrammemsProviderAbstract;
use phpMorphy_GrammemsProvider_GrammemsProviderInterface;
use phpMorphy_Morphier_Bulk;
use phpMorphy_Morphier_MorphierInterface;
use phpMorphy_MorphyInterface;
use phpMorphy_Paradigm_Collection;
use phpMorphy_Shm_Cache;
use yii\base\Component;

/**
 * Class PhpMorphy
 * @package aleksender\morphy
 */
class PhpMorphy extends Component implements phpMorphy_MorphyInterface
{
    /**
     * @var \phpMorphy
     */
    private $morphy;

    private static $langDict = [
        "ru_RU" => "ru_RU",
        "ru" => "ru_RU",
        "de_DE" => "de_DE",
        "uk_UA" => "uk_UA",
    ];

    /**
     * @var string 
     */
    public $lang = "ru";

    /**
     * @var string|null
     */
    public $dir = null;

    /**
     * @var array
     */
    public $options = [];

    /**
     * PhpMorphy constructor.
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        parent::__construct($config);
        
        $this->lang = static::$langDict[$this->lang];

        $this->morphy = new \phpMorphy($this->dir, $this->lang, $this->options);
    }
    
    /**
     * @return phpMorphy_Morphier_MorphierInterface
     */
    public function getCommonMorphier()
    {
        return $this->morphy->getCommonMorphier();
    }

    /**
     * @return phpMorphy_Morphier_MorphierInterface
     */
    public function getPredictBySuffixMorphier()
    {
        return $this->morphy->getPredictBySuffixMorphier();
    }

    /**
     * @return phpMorphy_Morphier_MorphierInterface
     */
    public function getPredictByDatabaseMorphier()
    {
        return $this->morphy->getPredictByDatabaseMorphier();
    }

    /**
     * @return phpMorphy_Morphier_Bulk
     */
    public function getBulkMorphier()
    {
        return $this->morphy->getBulkMorphier();
    }

    /**
     * @return string
     */
    public function getEncoding()
    {
        return $this->morphy->getEncoding();
    }

    /**
     * @return string
     */
    public function getLocale()
    {
        return $this->morphy->getLocale();
    }

    /**
     * @return bool
     * @throws \phpMorphy_Exception
     */
    public function isInUpperCase()
    {
        return $this->morphy->isInUpperCase();
    }

    /**
     * @return phpMorphy_GrammemsProvider_GrammemsProviderAbstract|phpMorphy_GrammemsProvider_GrammemsProviderInterface
     */
    public function getGrammemsProvider()
    {
        return $this->morphy->getGrammemsProvider();
    }

    /**
     * @return phpMorphy_GrammemsProvider_GrammemsProviderAbstract|phpMorphy_GrammemsProvider_GrammemsProviderInterface
     */
    public function getDefaultGrammemsProvider()
    {
        return $this->morphy->getDefaultGrammemsProvider();
    }

    /**
     * @return phpMorphy_Shm_Cache
     */
    public function getShmCache()
    {
        return $this->morphy->getShmCache();
    }

    /**
     * @return bool
     */
    public function isLastPredicted()
    {
        return $this->morphy->isLastPredicted();
    }

    /**
     * @return string PREDICT_BY_NONE, PREDICT_BY_SUFFIX, PREDICT_BY_DB
     */
    public function getLastPredictionType()
    {
        return $this->morphy->getLastPredictionType();
    }

    /**
     * @param mixed $word - string or array of strings
     * @param mixed $type - prediction managment
     * @return phpMorphy_Paradigm_Collection
     */
    public function findWord($word, $type = self::NORMAL)
    {
        return $this->morphy->findWord($word, $type);
    }

    /**
     * Alias for getBaseForm
     *
     * @param mixed $word - string or array of strings
     * @param mixed $type - prediction managment
     * @return array
     */
    public function lemmatize($word, $type = self::NORMAL)
    {
        return $this->morphy->lemmatize($word, $type);
    }

    /**
     * @param mixed $word - string or array of strings
     * @param mixed $type - prediction managment
     * @return array
     */
    public function getBaseForm($word, $type = self::NORMAL)
    {
        return $this->morphy->getBaseForm($word, $type);
    }

    /**
     * @param mixed $word - string or array of strings
     * @param mixed $type - prediction managment
     * @return array
     */
    public function getAllForms($word, $type = self::NORMAL)
    {
        return $this->morphy->getAllForms($word, $type);
    }

    /**
     * @param mixed $word - string or array of strings
     * @param mixed $type - prediction managment
     * @return array
     */
    public function getPseudoRoot($word, $type = self::NORMAL)
    {
        return $this->morphy->getPseudoRoot($word, $type);
    }

    /**
     * @param mixed $word - string or array of strings
     * @param mixed $type - prediction managment
     * @return array
     */
    public function getPartOfSpeech($word, $type = self::NORMAL)
    {
        return $this->morphy->getPartOfSpeech($word, $type);
    }

    /**
     * @param mixed $word - string or array of strings
     * @param mixed $type - prediction managment
     * @return array
     */
    public function getAllFormsWithAncodes($word, $type = self::NORMAL)
    {
        return $this->morphy->getAllFormsWithAncodes($word, $type);
    }

    /**
     * @param mixed $word - string or array of strings
     * @param bool $asText - represent graminfo as text or ancodes
     * @param mixed $type - prediction managment
     * @return array
     */
    public function getAllFormsWithGramInfo($word, $asText = true, $type = self::NORMAL)
    {
        return $this->morphy->getAllFormsWithGramInfo($word, $asText, $type);
    }

    /**
     * @param mixed $word - string or array of strings
     * @param mixed $type - prediction managment
     * @return array
     */
    public function getAncode($word, $type = self::NORMAL)
    {
        return $this->morphy->getAncode($word, $type);
    }

    /**
     * @param mixed $word - string or array of strings
     * @param mixed $type - prediction managment
     * @return array
     */
    public function getGramInfo($word, $type = self::NORMAL)
    {
        return $this->morphy->getGramInfo($word, $type);
    }

    /**
     * @param mixed $word - string or array of strings
     * @param mixed $type - prediction managment
     * @return array
     */
    public function getGramInfoMergeForms($word, $type = self::NORMAL)
    {
        return $this->morphy->getGramInfoMergeForms($word, $type);
    }

    /**
     * @param string $word
     * @param mixed $ancode
     * @param mixed $commonAncode
     * @param bool $returnOnlyWord
     * @param mixed $callback
     * @param mixed $type
     * @return array
     */
    public function castFormByAncode($word, $ancode, $commonAncode = null, $returnOnlyWord = false,
                              $callback = null, $type = self::NORMAL)
    {
        return $this->morphy->castFormByAncode($word, $ancode, $commonAncode, $returnOnlyWord, $callback, $type);
    }

    /**
     * @param string $word
     * @param mixed $partOfSpeech
     * @param array $grammems
     * @param bool $returnOnlyWord
     * @param mixed $callback
     * @param mixed $type
     * @return array
     */
    public function castFormByGramInfo($word, $partOfSpeech, $grammems, $returnOnlyWord = false,
                                $callback = null, $type = self::NORMAL)
    {
        return $this->morphy->castFormByGramInfo($word, $partOfSpeech, $grammems, $returnOnlyWord, $callback, $type);
    }

    /**
     * @param string $word
     * @param string $patternWord
     * @param phpMorphy_GrammemsProvider_GrammemsProviderInterface|null $grammemsProvider
     * @param bool $returnOnlyWord
     * @param mixed $callback
     * @param mixed $type
     * @return array
     */
    public function castFormByPattern($word, $patternWord,
                               phpMorphy_GrammemsProvider_GrammemsProviderInterface $grammemsProvider = null,
                               $returnOnlyWord = false, $callback = null, $type = self::NORMAL)
    {
        return $this->morphy->castFormByPattern($word, $patternWord, $grammemsProvider, $returnOnlyWord, $callback, $type);
    }
}