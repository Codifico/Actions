<?php

interface ActionRepositoryInterface {
    public function findByQueryCriteria(QueryCriteria $queryCriteria);

    public function countByQueryCriteria(QueryCriteria $queryCriteria);
}