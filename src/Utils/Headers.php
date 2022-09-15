<?php

namespace Aetonsi\Utils;

class Arrays
{
    /**
     * Flattens a multidimensional array to a single dimension dotted array.
     *
     * Adapted from: https://stackoverflow.com/a/10424516
     *
     * @param array $data
     * @return array
     */
    public static function flatten($data)
    {
        $ritit = new \RecursiveIteratorIterator(new \RecursiveArrayIterator($data));
        $result = [];
        foreach ($ritit as $leafValue) {
            $keys = [];
            foreach (\range(0, $ritit->getDepth()) as $depth) {
                $keys[] = $ritit->getSubIterator($depth)->key();
            }
            $result[\join('.', $keys)] = $leafValue;
        }
        return $result;
    }
}
