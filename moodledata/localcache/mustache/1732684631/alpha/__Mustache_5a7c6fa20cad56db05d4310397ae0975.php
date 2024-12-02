<?php

class __Mustache_5a7c6fa20cad56db05d4310397ae0975 extends Mustache_Template
{
    private $lambdaHelper;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        $value = $context->find('url');
        $buffer .= $this->section67966b1b899a8de75c9f96bc01944bf9($context, $indent, $value);

        return $buffer;
    }

    private function sectionB93b7e4e5c001d45dce7ffd963651f59(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'data-toggle="tooltip" title="{{{pluginname}}}" data-placement="top"';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'data-toggle="tooltip" title="';
                $value = $this->resolveValue($context->find('pluginname'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '" data-placement="top"';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section5fb8f4873e24cc08353dc61cdb42dc9f(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = ' activityicon, moodle, {{{pluginname}}} ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= ' activityicon, moodle, ';
                $value = $this->resolveValue($context->find('pluginname'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= ' ';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section0cacfcf800f98bd910c708c6e89ca260(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
        <a href="{{url}}"
            class="activity-icon activityiconcontainer smaller {{purpose}} courseicon align-self-start position-relative"
            {{#showtooltip}}data-toggle="tooltip" title="{{{pluginname}}}" data-placement="top"{{/showtooltip}}
        >
            <img src="{{{icon}}}" class="activityicon {{iconclass}}"
                 alt="{{#cleanstr}} activityicon, moodle, {{{pluginname}}} {{/cleanstr}}"
            >
        </a>
    ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '        <a href="';
                $value = $this->resolveValue($context->find('url'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '"
';
                $buffer .= $indent . '            class="activity-icon activityiconcontainer smaller ';
                $value = $this->resolveValue($context->find('purpose'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= ' courseicon align-self-start position-relative"
';
                $buffer .= $indent . '            ';
                $value = $context->find('showtooltip');
                $buffer .= $this->sectionB93b7e4e5c001d45dce7ffd963651f59($context, $indent, $value);
                $buffer .= '
';
                $buffer .= $indent . '        >
';
                $buffer .= $indent . '            <img src="';
                $value = $this->resolveValue($context->find('icon'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '" class="activityicon ';
                $value = $this->resolveValue($context->find('iconclass'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '"
';
                $buffer .= $indent . '                 alt="';
                $value = $context->find('cleanstr');
                $buffer .= $this->section5fb8f4873e24cc08353dc61cdb42dc9f($context, $indent, $value);
                $buffer .= '"
';
                $buffer .= $indent . '            >
';
                $buffer .= $indent . '        </a>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section67966b1b899a8de75c9f96bc01944bf9(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
    {{#uservisible}}
        <a href="{{url}}"
            class="activity-icon activityiconcontainer smaller {{purpose}} courseicon align-self-start position-relative"
            {{#showtooltip}}data-toggle="tooltip" title="{{{pluginname}}}" data-placement="top"{{/showtooltip}}
        >
            <img src="{{{icon}}}" class="activityicon {{iconclass}}"
                 alt="{{#cleanstr}} activityicon, moodle, {{{pluginname}}} {{/cleanstr}}"
            >
        </a>
    {{/uservisible}}
    {{^uservisible}}
        <div class="activity-icon activityiconcontainer smaller {{purpose}} courseicon align-self-start">
            <img src="{{{icon}}}" class="activityicon {{iconclass}}"
                 alt="{{#cleanstr}} activityicon, moodle, {{{pluginname}}} {{/cleanstr}}"
            >
        </div>
    {{/uservisible}}
';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $value = $context->find('uservisible');
                $buffer .= $this->section0cacfcf800f98bd910c708c6e89ca260($context, $indent, $value);
                $value = $context->find('uservisible');
                if (empty($value)) {
                    
                    $buffer .= $indent . '        <div class="activity-icon activityiconcontainer smaller ';
                    $value = $this->resolveValue($context->find('purpose'), $context);
                    $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                    $buffer .= ' courseicon align-self-start">
';
                    $buffer .= $indent . '            <img src="';
                    $value = $this->resolveValue($context->find('icon'), $context);
                    $buffer .= ($value === null ? '' : $value);
                    $buffer .= '" class="activityicon ';
                    $value = $this->resolveValue($context->find('iconclass'), $context);
                    $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                    $buffer .= '"
';
                    $buffer .= $indent . '                 alt="';
                    $value = $context->find('cleanstr');
                    $buffer .= $this->section5fb8f4873e24cc08353dc61cdb42dc9f($context, $indent, $value);
                    $buffer .= '"
';
                    $buffer .= $indent . '            >
';
                    $buffer .= $indent . '        </div>
';
                }
                $context->pop();
            }
        }
    
        return $buffer;
    }

}
