<?php

class __Mustache_606ccc5bc6a1bcea1022c981a938c1c4 extends Mustache_Template
{
    private $lambdaHelper;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        $value = $context->find('isInteractive');
        $buffer .= $this->section626c16b78d92c2ba88bf7e2b535d2186($context, $indent, $value);
        $value = $context->find('isInteractive');
        if (empty($value)) {
            
            $buffer .= $indent . '    <div
';
            $buffer .= $indent . '    data-region="groupmode-information"
';
            $buffer .= $indent . '    data-activityname="';
            $value = $this->resolveValue($context->find('activityname'), $context);
            $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
            $buffer .= '"
';
            $buffer .= $indent . '    class="groupmode-information d-flex align-items-center justify-content-center icon-no-margin"
';
            $buffer .= $indent . '>
';
            $buffer .= $indent . '    <span class="badge badge-xs badge-light">
';
            $buffer .= $indent . '        ';
            $value = $context->find('groupicon');
            $buffer .= $this->sectionBe67a45eb42e98accc75b5c263d6b289($context, $indent, $value);
            $buffer .= '
';
            $value = $context->find('groupalt');
            $buffer .= $this->section3848f0a04270a6af5bd6ac4a4335d876($context, $indent, $value);
            $buffer .= $indent . '    </span>
';
            $buffer .= $indent . '</div>
';
        }

        return $buffer;
    }

    private function section32db0b198771114975407fc1b32ded20(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = ' v-parent-focus ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= ' v-parent-focus ';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section08b2a45eaa4883b8b0fd7ed032a6af0e(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
        {{< core/local/dropdown/status}}
            {{$ buttonclasses }}
                {{#autohide}} v-parent-focus {{/autohide}}
                groupmode-information btn px-1 btn-xs btn-secondary
            {{/ buttonclasses }}
            {{$ buttoncontent }}
                {{{groupicon}}}
                <span class="groupmode-icon-info d-none d-md-block">{{groupalt}}</span>
            {{/ buttoncontent }}
        {{/ core/local/dropdown/status}}
    ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '        ';
                if ($parent = $this->mustache->loadPartial('core/local/dropdown/status')) {
                    $context->pushBlockContext(array(
                        'buttonclasses' => array($this, 'blockC7049c9c0154d89820bfe5dd43996a84'),
                        'buttoncontent' => array($this, 'blockA7b88ec3005b24fc4e2a9b85984231f1'),
                    ));
                    $buffer .= $parent->renderInternal($context, $indent);
                    $context->popBlockContext();
                }
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section626c16b78d92c2ba88bf7e2b535d2186(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
    {{#dropwdown}}
        {{< core/local/dropdown/status}}
            {{$ buttonclasses }}
                {{#autohide}} v-parent-focus {{/autohide}}
                groupmode-information btn px-1 btn-xs btn-secondary
            {{/ buttonclasses }}
            {{$ buttoncontent }}
                {{{groupicon}}}
                <span class="groupmode-icon-info d-none d-md-block">{{groupalt}}</span>
            {{/ buttoncontent }}
        {{/ core/local/dropdown/status}}
    {{/dropwdown}}
';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $value = $context->find('dropwdown');
                $buffer .= $this->section08b2a45eaa4883b8b0fd7ed032a6af0e($context, $indent, $value);
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionBe67a45eb42e98accc75b5c263d6b289(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '{{{groupicon}}}';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $value = $this->resolveValue($context->find('groupicon'), $context);
                $buffer .= ($value === null ? '' : $value);
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section3848f0a04270a6af5bd6ac4a4335d876(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
            <div class="groupmode-icon-info ml-2">{{groupalt}}</div>
        ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '            <div class="groupmode-icon-info ml-2">';
                $value = $this->resolveValue($context->find('groupalt'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '</div>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    public function blockC7049c9c0154d89820bfe5dd43996a84($context)
    {
        $indent = $buffer = '';
        $buffer .= '                ';
        $value = $context->find('autohide');
        $buffer .= $this->section32db0b198771114975407fc1b32ded20($context, $indent, $value);
        $buffer .= '
';
        $buffer .= $indent . '                groupmode-information btn px-1 btn-xs btn-secondary
';
    
        return $buffer;
    }

    public function blockA7b88ec3005b24fc4e2a9b85984231f1($context)
    {
        $indent = $buffer = '';
        $buffer .= $indent . '                ';
        $value = $this->resolveValue($context->find('groupicon'), $context);
        $buffer .= ($value === null ? '' : $value);
        $buffer .= '
';
        $buffer .= $indent . '                <span class="groupmode-icon-info d-none d-md-block">';
        $value = $this->resolveValue($context->find('groupalt'), $context);
        $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
        $buffer .= '</span>
';
    
        return $buffer;
    }
}
