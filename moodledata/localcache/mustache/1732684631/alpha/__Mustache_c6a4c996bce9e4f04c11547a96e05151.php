<?php

class __Mustache_c6a4c996bce9e4f04c11547a96e05151 extends Mustache_Template
{
    private $lambdaHelper;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        $buffer .= $indent . '
';
        $value = $context->find('moveicon');
        $buffer .= $this->section2e7d3cdfffee27291ffca5f384d8d23d($context, $indent, $value);
        $buffer .= '
';
        $buffer .= $indent . '<div class="align-items-center ';
        $value = $context->find('isautomatic');
        $buffer .= $this->sectionA6757e1db9273769542d5d993cc3db2a($context, $indent, $value);
        $buffer .= ' ';
        $value = $context->find('completion');
        $buffer .= $this->section00bc447de3f2f44e1eda6005818d7c24($context, $indent, $value);
        $buffer .= '">
';
        $buffer .= $indent . '    
';
        $buffer .= $indent . '    <div>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '        <div class="activity-basis d-flex align-items-center flex-wrap">
';
        $value = $context->find('completion');
        $buffer .= $this->section590b09457f45ef62a9a769e7c98d739e($context, $indent, $value);
        $buffer .= $indent . '            <div class="d-flex flex-column flex-md-row align-items-center">
';
        $value = $context->find('cmname');
        $buffer .= $this->section7d45c4f2d18d7046b66c9ad2818a17c3($context, $indent, $value);
        $buffer .= $indent . '            </div>
';
        $value = $context->find('groupmodeinfo');
        $buffer .= $this->section6cc6ada63f9cb8f3d3b9779b44dec63c($context, $indent, $value);
        $value = $context->find('controlmenu');
        $buffer .= $this->section52bf8e772972569124b5ba9fb7517fe0($context, $indent, $value);
        $buffer .= $indent . '        </div>
';
        $blockFunction = $context->findInBlock('core_courseformat/local/content/cm/badges');
        if (is_callable($blockFunction)) {
            $buffer .= call_user_func($blockFunction, $context);
        } else {
            if ($partial = $this->mustache->loadPartial('core_courseformat/local/content/cm/badges')) {
                $buffer .= $partial->renderInternal($context, $indent . '            ');
            }
        }
        $buffer .= $indent . '    
';
        $buffer .= $indent . '        <div class="rui-contentafterlink contentafterlink description ';
        $value = $context->find('completion');
        if (empty($value)) {
            
            $buffer .= 'rui--nocompletion';
        }
        $buffer .= '">
';
        $value = $context->find('altcontent');
        $buffer .= $this->sectionB37aedf55c70c742ba6a6a85b4fbd726($context, $indent, $value);
        $buffer .= $indent . '
';
        $value = $context->find('modavailability');
        $buffer .= $this->section6ce7e38fbcdf5ddc37d272093199a2b1($context, $indent, $value);
        $buffer .= $indent . '        </div>
';
        $buffer .= $indent . '
';
        $value = $context->find('afterlink');
        $buffer .= $this->section80f853d739553be9e73fca32f683a657($context, $indent, $value);
        $buffer .= $indent . '
';
        $buffer .= $indent . '    </div>    
';
        $buffer .= $indent . '
';
        $value = $context->find('dates');
        $buffer .= $this->section9e4a9327abb1995d7750ed65585f80fb($context, $indent, $value);
        $buffer .= $indent . '
';
        $buffer .= $indent . '</div>';

        return $buffer;
    }

    private function section2e7d3cdfffee27291ffca5f384d8d23d(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = ' {{{moveicon}}} ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . ' ';
                $value = $this->resolveValue($context->find('moveicon'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= ' ';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionA6757e1db9273769542d5d993cc3db2a(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'rui--activity-is-automatic';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'rui--activity-is-automatic';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section1f1861f0ef8d03f4fa0f6cd8e43ed953(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'rui--has-completion';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'rui--has-completion';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section00bc447de3f2f44e1eda6005818d7c24(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '{{#hascompletion}}rui--has-completion{{/hascompletion}}';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $value = $context->find('hascompletion');
                $buffer .= $this->section1f1861f0ef8d03f4fa0f6cd8e43ed953($context, $indent, $value);
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionBa8602532161b6864d832425a772cdb1(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                    <div class="activity-completion align-self-center">
                        {{$ core_courseformat/local/content/cm/activity_info}}
                            {{> core_courseformat/local/content/cm/activity_info}}
                        {{/ core_courseformat/local/content/cm/activity_info}}
                    </div>
                ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '                    <div class="activity-completion align-self-center">
';
                $blockFunction = $context->findInBlock('core_courseformat/local/content/cm/activity_info');
                if (is_callable($blockFunction)) {
                    $buffer .= call_user_func($blockFunction, $context);
                } else {
                    if ($partial = $this->mustache->loadPartial('core_courseformat/local/content/cm/activity_info')) {
                        $buffer .= $partial->renderInternal($context, $indent . '                            ');
                    }
                }
                $buffer .= $indent . '                    </div>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section590b09457f45ef62a9a769e7c98d739e(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                {{#hascompletion}}
                    <div class="activity-completion align-self-center">
                        {{$ core_courseformat/local/content/cm/activity_info}}
                            {{> core_courseformat/local/content/cm/activity_info}}
                        {{/ core_courseformat/local/content/cm/activity_info}}
                    </div>
                {{/hascompletion}}
            ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $value = $context->find('hascompletion');
                $buffer .= $this->sectionBa8602532161b6864d832425a772cdb1($context, $indent, $value);
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section7d45c4f2d18d7046b66c9ad2818a17c3(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                {{$ core_courseformat/local/content/cm/cmname }}
                    {{> core_courseformat/local/content/cm/cmname }}
                {{/ core_courseformat/local/content/cm/cmname }}
                ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $blockFunction = $context->findInBlock('core_courseformat/local/content/cm/cmname');
                if (is_callable($blockFunction)) {
                    $buffer .= call_user_func($blockFunction, $context);
                } else {
                    if ($partial = $this->mustache->loadPartial('core_courseformat/local/content/cm/cmname')) {
                        $buffer .= $partial->renderInternal($context, $indent . '                    ');
                    }
                }
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section6cc6ada63f9cb8f3d3b9779b44dec63c(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                <div
                    class="activity-groupmode-info align-self-center ml-auto"
                    data-region="groupmode"
                >
                    {{$ core_courseformat/local/content/cm/groupmode}}
                        {{> core_courseformat/local/content/cm/groupmode}}
                    {{/ core_courseformat/local/content/cm/groupmode}}
                </div>
            ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '                <div
';
                $buffer .= $indent . '                    class="activity-groupmode-info align-self-center ml-auto"
';
                $buffer .= $indent . '                    data-region="groupmode"
';
                $buffer .= $indent . '                >
';
                $blockFunction = $context->findInBlock('core_courseformat/local/content/cm/groupmode');
                if (is_callable($blockFunction)) {
                    $buffer .= call_user_func($blockFunction, $context);
                } else {
                    if ($partial = $this->mustache->loadPartial('core_courseformat/local/content/cm/groupmode')) {
                        $buffer .= $partial->renderInternal($context, $indent . '                        ');
                    }
                }
                $buffer .= $indent . '                </div>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section29cf713cc55fb31d24a382fdf5a933ab(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'ml-2';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'ml-2';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section52bf8e772972569124b5ba9fb7517fe0(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                <div class="activity-actions align-self-start {{#groupmodeinfo}}ml-2{{/groupmodeinfo}} {{^groupmodeinfo}}ml-auto{{/groupmodeinfo}}">
                    {{$ core_courseformat/local/content/cm/controlmenu }}
                        {{> core_courseformat/local/content/cm/controlmenu }}
                    {{/ core_courseformat/local/content/cm/controlmenu }}
                </div>
            ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '                <div class="activity-actions align-self-start ';
                $value = $context->find('groupmodeinfo');
                $buffer .= $this->section29cf713cc55fb31d24a382fdf5a933ab($context, $indent, $value);
                $buffer .= ' ';
                $value = $context->find('groupmodeinfo');
                if (empty($value)) {
                    
                    $buffer .= 'ml-auto';
                }
                $buffer .= '">
';
                $blockFunction = $context->findInBlock('core_courseformat/local/content/cm/controlmenu');
                if (is_callable($blockFunction)) {
                    $buffer .= call_user_func($blockFunction, $context);
                } else {
                    if ($partial = $this->mustache->loadPartial('core_courseformat/local/content/cm/controlmenu')) {
                        $buffer .= $partial->renderInternal($context, $indent . '                        ');
                    }
                }
                $buffer .= $indent . '                </div>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section61d800615458d5f2b5b172089e8f6bfd(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'mt-2 course-description-item ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'mt-2 course-description-item ';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionB37aedf55c70c742ba6a6a85b4fbd726(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                <div class="activity-altcontent {{#hasname}}mt-2 course-description-item {{/hasname}}{{^hasname}}contentwithoutlink{{/hasname}} d-flex text-break">
                    <div class="flex-fill description-inner">
                        {{{altcontent}}}
                    </div>
                </div>
            ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '                <div class="activity-altcontent ';
                $value = $context->find('hasname');
                $buffer .= $this->section61d800615458d5f2b5b172089e8f6bfd($context, $indent, $value);
                $value = $context->find('hasname');
                if (empty($value)) {
                    
                    $buffer .= 'contentwithoutlink';
                }
                $buffer .= ' d-flex text-break">
';
                $buffer .= $indent . '                    <div class="flex-fill description-inner">
';
                $buffer .= $indent . '                        ';
                $value = $this->resolveValue($context->find('altcontent'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '
';
                $buffer .= $indent . '                    </div>
';
                $buffer .= $indent . '                </div>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section6ce7e38fbcdf5ddc37d272093199a2b1(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                {{$ core_courseformat/local/content/cm/availability }}
                    {{> core_courseformat/local/content/cm/availability }}
                {{/ core_courseformat/local/content/cm/availability }}
            ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $blockFunction = $context->findInBlock('core_courseformat/local/content/cm/availability');
                if (is_callable($blockFunction)) {
                    $buffer .= call_user_func($blockFunction, $context);
                } else {
                    if ($partial = $this->mustache->loadPartial('core_courseformat/local/content/cm/availability')) {
                        $buffer .= $partial->renderInternal($context, $indent . '                    ');
                    }
                }
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section80f853d739553be9e73fca32f683a657(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
            <div class="rui-contentafterlink afterlink mt-2">
                {{{afterlink}}}
            </div>
        ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '            <div class="rui-contentafterlink afterlink mt-2">
';
                $buffer .= $indent . '                ';
                $value = $this->resolveValue($context->find('afterlink'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '
';
                $buffer .= $indent . '            </div>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionAfb6fd07ae9e251f9844989d26fe82a9(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                    {{$core_course/activity_date}}
                        {{>core_course/activity_date}}
                    {{/core_course/activity_date}}
                ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $blockFunction = $context->findInBlock('core_course/activity_date');
                if (is_callable($blockFunction)) {
                    $buffer .= call_user_func($blockFunction, $context);
                } else {
                    if ($partial = $this->mustache->loadPartial('core_course/activity_date')) {
                        $buffer .= $partial->renderInternal($context, $indent . '                        ');
                    }
                }
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section42ef2e643277e0caff14f71693764245(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
            <div data-region="activity-dates" class="rui-activity-dates activity-dates course-description-item {{^completion}}rui--nocompletion{{/completion}}">
                {{#activitydates}}
                    {{$core_course/activity_date}}
                        {{>core_course/activity_date}}
                    {{/core_course/activity_date}}
                {{/activitydates}}
            </div>
        ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '            <div data-region="activity-dates" class="rui-activity-dates activity-dates course-description-item ';
                $value = $context->find('completion');
                if (empty($value)) {
                    
                    $buffer .= 'rui--nocompletion';
                }
                $buffer .= '">
';
                $value = $context->find('activitydates');
                $buffer .= $this->sectionAfb6fd07ae9e251f9844989d26fe82a9($context, $indent, $value);
                $buffer .= $indent . '            </div>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section9e4a9327abb1995d7750ed65585f80fb(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
        {{#hasdates}}
            <div data-region="activity-dates" class="rui-activity-dates activity-dates course-description-item {{^completion}}rui--nocompletion{{/completion}}">
                {{#activitydates}}
                    {{$core_course/activity_date}}
                        {{>core_course/activity_date}}
                    {{/core_course/activity_date}}
                {{/activitydates}}
            </div>
        {{/hasdates}}
    ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $value = $context->find('hasdates');
                $buffer .= $this->section42ef2e643277e0caff14f71693764245($context, $indent, $value);
                $context->pop();
            }
        }
    
        return $buffer;
    }

}
