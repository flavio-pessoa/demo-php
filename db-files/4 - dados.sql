--
-- Extraindo dados da tabela `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1477357864),
('m140506_102106_rbac_init', 1477357870),
('m150626_000001_create_audit_entry', 1497203140),
('m150626_000002_create_audit_data', 1497203141),
('m150626_000003_create_audit_error', 1497203143),
('m150626_000004_create_audit_trail', 1497203144),
('m150626_000005_create_audit_javascript', 1497203146),
('m150626_000006_create_audit_mail', 1497203147),
('m150714_000001_alter_audit_data', 1497203147),
('m170126_000001_alter_audit_mail', 1497203149);

--
-- Extraindo dados da tabela `usuario`
--
INSERT INTO `departamento` (`cod_departamento`, `nome_departamento`,`status_departamento`,`vlr_limite_departamento`) VALUES
(1, 'Administração', '1',500.00);

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`cod_funcionario`, `cod_departamento`, `nome_funcionario`, `email_funcionario`, `login_funcionario`, `senha_funcionario`, `status_funcionario`, `authKey_funcionario`, `accessToken_funcionario`) VALUES 
(1, 1, 'Administrador Geral', 'admin@example.com.br', 'admin', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', '1','etSxB05sOu8HG8qA1BPHY2XPk42xp4TC','m_EX9P2rGiy7hZUHwyFAtgwrBxCJTI7R'),
(2, 1, 'FLAVIO LUIS LOPES PESSOA', 'flavio.pessoa@example.com.br', 'flavio.pessoa', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', '1','1UjD5n8W6-7eoAVIqCAZvD83wQNlZ5_d','gfg9DwV_pUEh4yXZFP4bvm2FXe5KkCyl');