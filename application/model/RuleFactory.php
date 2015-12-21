<?php

class RuleFactory {
	
	public static function getRules ($userID, $cate='beAdded') {
		if ($userID) {
			switch ($cate) {
				case "beAdded":
					$rules_res = DB::fetchAll("SELECT ruleID FROM rules WHERE userID='".ms($userID)."' AND entryID = 1");
					break;
				case "message":
					$rules_res = DB::fetchAll("SELECT ruleID FROM rules WHERE userID='".ms($userID)."' AND entryID = 2");
					break;
				default:
					$rules_res = DB::fetchAll("SELECT ruleID FROM rules WHERE userID='".ms($userID)."' AND entryID > 2");
					break;
			}
			$rules = array();
			foreach ($rules_res as $r) {
				$rules[] = self::getRule($r['ruleID']);
			}
			return $rules;
		}
		exit;
	}
	
	public static function getFirstRule ($userID, $cate='beAdded') {
		if ($userID) {
			switch ($cate) {
				case "beAdded":
					$rule_res = DB::execute("SELECT ruleID FROM rules WHERE userID='".ms($userID)."' AND entryID = 1");
					break;
				case "message":
					$rule_res = DB::execute("SELECT ruleID FROM rules WHERE userID='".ms($userID)."' AND entryID = 2");
					break;
				default:
					$rule_res = DB::execute("SELECT ruleID FROM rules WHERE userID='".ms($userID)."' AND entryID > 2");
					break;
			}
			return self::getRule($rule_res['ruleID']);
		}
		exit;
	}
	
	public static function getRule ($ruleID) {
		if ($ruleID) {
			$rule = DB::execute("SELECT entryID, ruleName, userID FROM rules WHERE ruleID='".ms($ruleID)."'");
			if (count($rule) > 0) {
				$ruleObj = new Rule($rule["userID"]);
				$ruleObj->setRuleID($ruleID);
				$ruleObj->setEntryID($rule["entryID"]);
				$ruleObj->setRuleName($rule["ruleName"]);
				
				$keywords = DB::fetchAll("SELECT keyword FROM rules AS r, keyword_entries AS k WHERE ruleID='".ms($ruleID)."' AND r.entryID=k.entryID");
				$replies = DB::fetchAll("SELECT messageID FROM reply_msg WHERE ruleID='".ms($ruleID)."'");
				
				$ruleObj->initKeywords($keywords);
				$ruleObj->initReplies($replies);
				return $ruleObj;
			} else {
				if (DEBUG_MODE) {
					echo "[RuleFactory | getRule] Cannot find rule from DB where ruleID = ".$this->ruleID;
				}
			}
		}
		exit;
	}
	
	public static function createRule ($userID, $ruleName, $type=3) {
		$rule = new Rule($userID);
		$entryID = $type;
		if ($type == 3) {
			$max_res = DB::execute("SELECT MAX(entryID) AS max FROM rules WHERE userID='".ms($userID)."'");
			if (count($max_res) > 0 && $max_res["max"] > 3) {
				$entryID = $max_res["max"] + 1;
			}
		}
		$rule->setEntryID($entryID);
		$rule->setRuleName($ruleName);
		return $rule;
	}
	
}

?>