<?php

class __Mustache_bb68a7e944c95a36d9fd3fcb1024f60c extends Mustache_Template
{
    private $lambdaHelper;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        $buffer .= $indent . '<div class="form-group row ';
        $value = $context->find('error');
        $buffer .= $this->section4d4b829e8a762a460d7710f0a2273a46($context, $indent, $value);
        $buffer .= ' fitem ';
        $value = $context->find('advanced');
        $buffer .= $this->sectionB2a3879159edb3a7a33a1d8394a2c556($context, $indent, $value);
        $buffer .= ' ';
        $value = $this->resolveValue($context->findDot('element.extraclasses'), $context);
        $buffer .= ($value === null ? '' : $value);
        $buffer .= ' ';
        $value = $this->resolveValue($context->findDot('element.parentclasses'), $context);
        $buffer .= ($value === null ? '' : $value);
        $buffer .= '">
';
        $buffer .= $indent . '    <div class="col-md-3 col-form-label pb-0 pt-0 text-right">
';
        $value = $context->find('text');
        $buffer .= $this->sectionDe948f9aa73b4c9bf129865f10b3847a($context, $indent, $value);
        $buffer .= $indent . '    </div>
';
        $buffer .= $indent . '    <div class="col-md-9 checkbox px-0">
';
        $buffer .= $indent . '        <div class="form-check d-flex custom-control custom-switch ml-6">
';
        $value = $context->findDot('element.hardfrozen');
        if (empty($value)) {
            
            $value = $context->findDot('element.frozen');
            if (empty($value)) {
                
                $buffer .= $indent . '                        <input type="hidden" name="';
                $value = $this->resolveValue($context->findDot('element.name'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '" value="';
                $value = $this->resolveValue($context->findDot('element.deselectedvalue'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '">
';
            }
            $value = $context->findDot('element.frozen');
            $buffer .= $this->section15924a89021e7d4ebc983132c41c1a60($context, $indent, $value);
        }
        $buffer .= $indent . '
';
        $buffer .= $indent . '                <input type="checkbox"
';
        $buffer .= $indent . '                    name="';
        $value = $this->resolveValue($context->findDot('element.name'), $context);
        $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
        $buffer .= '"
';
        $buffer .= $indent . '                    class="form-check-input custom-control-input ';
        $value = $this->resolveValue($context->findDot('element.extraclasses'), $context);
        $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
        $buffer .= '"
';
        $value = $context->findDot('element.selectedvalue');
        $buffer .= $this->sectionC187912cbb1b7e9c32e072e6b5261c3c($context, $indent, $value);
        $buffer .= $indent . '                    id="';
        $value = $this->resolveValue($context->findDot('element.id'), $context);
        $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
        $buffer .= '" ';
        $value = $context->findDot('element.checked');
        $buffer .= $this->section51d7c9c652ced0161cb587bacd669266($context, $indent, $value);
        $buffer .= '
';
        $value = $context->find('error');
        $buffer .= $this->sectionE5820b4de06c09f3cc28a3c6b4a63c67($context, $indent, $value);
        $value = $context->find('error');
        if (empty($value)) {
            
            $value = $context->find('text');
            $buffer .= $this->sectionC5fae346ed58e7e72ec6b43d41b6361b($context, $indent, $value);
        }
        $value = $context->findDot('element.frozen');
        $buffer .= $this->section3ce6a86ce91dbb6006904d37c41e78b6($context, $indent, $value);
        $buffer .= $indent . '                    ';
        $value = $this->resolveValue($context->findDot('element.attributes'), $context);
        $buffer .= ($value === null ? '' : $value);
        $buffer .= ' >
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '                <label class="custom-control-label" for="';
        $value = $this->resolveValue($context->findDot('element.id'), $context);
        $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
        $buffer .= '"></label>
';
        $value = $context->find('text');
        $buffer .= $this->section2605f4a187143bdabbf31148814582e7($context, $indent, $value);
        $value = $context->find('text');
        if (empty($value)) {
            
            $buffer .= $indent . '                    <label>
';
            $buffer .= $indent . '                        ';
            $value = $this->resolveValue($context->find('label'), $context);
            $buffer .= ($value === null ? '' : $value);
            $buffer .= '
';
            $buffer .= $indent . '                    </label>
';
        }
        $buffer .= $indent . '            <div class="ml-2 d-flex align-items-center align-self-start">
';
        $value = $context->find('required');
        $buffer .= $this->sectionB1dd7f9087dd7167bf5c39fcc7378c16($context, $indent, $value);
        $buffer .= $indent . '                ';
        $value = $this->resolveValue($context->find('helpbutton'), $context);
        $buffer .= ($value === null ? '' : $value);
        $buffer .= '
';
        $buffer .= $indent . '            </div>
';
        $buffer .= $indent . '        </div>
';
        $buffer .= $indent . '        <div class="form-control-feedback invalid-feedback" id="';
        $value = $this->resolveValue($context->findDot('element.iderror'), $context);
        $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
        $buffer .= '" ';
        $value = $context->find('error');
        $buffer .= $this->section89151e805fdb13289dd93afb50acb5df($context, $indent, $value);
        $buffer .= '>
';
        $buffer .= $indent . '            ';
        $value = $this->resolveValue($context->find('error'), $context);
        $buffer .= ($value === null ? '' : $value);
        $buffer .= '
';
        $buffer .= $indent . '        </div>
';
        $buffer .= $indent . '    </div>
';
        $buffer .= $indent . '</div>
';
        $value = $context->findDot('element.frozen');
        if (empty($value)) {
            
            $value = $context->find('js');
            $buffer .= $this->section5e3e2402022649a7456d563a4d4a94cd($context, $indent, $value);
        }

        return $buffer;
    }

    private function section4d4b829e8a762a460d7710f0a2273a46(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'has-danger';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'has-danger';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionB2a3879159edb3a7a33a1d8394a2c556(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'advanced';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'advanced';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionDe948f9aa73b4c9bf129865f10b3847a(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
            <label class="d-inline word-break" for="{{element.id}}">
                {{{label}}}
            </label>
        ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '            <label class="d-inline word-break" for="';
                $value = $this->resolveValue($context->findDot('element.id'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '">
';
                $buffer .= $indent . '                ';
                $value = $this->resolveValue($context->find('label'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '
';
                $buffer .= $indent . '            </label>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section15924a89021e7d4ebc983132c41c1a60(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                        <input type="hidden" name="{{element.name}}" value="{{element.frozenvalue}}">
                    ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '                        <input type="hidden" name="';
                $value = $this->resolveValue($context->findDot('element.name'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '" value="';
                $value = $this->resolveValue($context->findDot('element.frozenvalue'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '">
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionC187912cbb1b7e9c32e072e6b5261c3c(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                        value="{{element.selectedvalue}}"
                    ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '                        value="';
                $value = $this->resolveValue($context->findDot('element.selectedvalue'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '"
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section51d7c9c652ced0161cb587bacd669266(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'checked';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'checked';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section396913931040e0fce67cfd74760098cf(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '{{element.id}}_description ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $value = $this->resolveValue($context->findDot('element.id'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '_description ';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionE5820b4de06c09f3cc28a3c6b4a63c67(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                        autofocus aria-describedby="{{#text}}{{element.id}}_description {{/text}}{{element.iderror}}"
                    ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '                        autofocus aria-describedby="';
                $value = $context->find('text');
                $buffer .= $this->section396913931040e0fce67cfd74760098cf($context, $indent, $value);
                $value = $this->resolveValue($context->findDot('element.iderror'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '"
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionC5fae346ed58e7e72ec6b43d41b6361b(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                            aria-describedby="{{element.id}}_description"
                        ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '                            aria-describedby="';
                $value = $this->resolveValue($context->findDot('element.id'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '_description"
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section3ce6a86ce91dbb6006904d37c41e78b6(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                        disabled
                    ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '                        disabled
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section2605f4a187143bdabbf31148814582e7(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                    <span id="{{element.id}}_description">
                        {{{.}}}
                    </span>
                ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '                    <span id="';
                $value = $this->resolveValue($context->findDot('element.id'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '_description">
';
                $buffer .= $indent . '                        ';
                $value = $this->resolveValue($context->last(), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '
';
                $buffer .= $indent . '                    </span>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section5197bd4c78ccebd47c9f052795fcb4e4(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'required';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'required';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section1a62044b8b32f10f428bdf36250d9aac(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'req, core, {{#str}}required{{/str}}';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'req, core, ';
                $value = $context->find('str');
                $buffer .= $this->section5197bd4c78ccebd47c9f052795fcb4e4($context, $indent, $value);
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionB1dd7f9087dd7167bf5c39fcc7378c16(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                    <div class="text-danger" title="{{#str}}required{{/str}}">
                    {{#pix}}req, core, {{#str}}required{{/str}}{{/pix}}
                    </div>
                ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '                    <div class="text-danger" title="';
                $value = $context->find('str');
                $buffer .= $this->section5197bd4c78ccebd47c9f052795fcb4e4($context, $indent, $value);
                $buffer .= '">
';
                $buffer .= $indent . '                    ';
                $value = $context->find('pix');
                $buffer .= $this->section1a62044b8b32f10f428bdf36250d9aac($context, $indent, $value);
                $buffer .= '
';
                $buffer .= $indent . '                    </div>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section89151e805fdb13289dd93afb50acb5df(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = ' style="display: block;"';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= ' style="display: block;"';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionD51d59cf174abfd59abe29508608fc20(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '{{element.id}}';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $value = $this->resolveValue($context->findDot('element.id'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section5e3e2402022649a7456d563a4d4a94cd(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
require([\'theme_alpha/form-display-errors\'], function(module) {
    module.enhance({{#quote}}{{element.id}}{{/quote}});
});
';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . 'require([\'theme_alpha/form-display-errors\'], function(module) {
';
                $buffer .= $indent . '    module.enhance(';
                $value = $context->find('quote');
                $buffer .= $this->sectionD51d59cf174abfd59abe29508608fc20($context, $indent, $value);
                $buffer .= ');
';
                $buffer .= $indent . '});
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

}
