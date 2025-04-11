// Deny all inbound traffic on WAN
$config['filter']['rule'][] = array(
    'type' => 'block',
    'interface' => 'wan',
    'ipprotocol' => 'inet',
    'protocol' => 'any',
    'source' => array('any' => true),
    'destination' => array('any' => true),
    'descr' => 'Default deny inbound',
);

// === ALLOW RULES FOR LAN SCORING SERVICES ===
$config['filter']['rule'][] = array(
    'type' => 'pass',
    'interface' => 'lan',
    'ipprotocol' => 'inet',
    'protocol' => 'tcp',
    'source' => array('any' => true),
    'destination' => array('network' => 'LAN net', 'port' => '22'),
    'descr' => 'Allow SSH to LAN',
);

$config['filter']['rule'][] = array(
    'type' => 'pass',
    'interface' => 'lan',
    'ipprotocol' => 'inet',
    'protocol' => 'icmp',
    'source' => array('any' => true),
    'destination' => array('network' => 'LAN net'),
    'descr' => 'Allow ICMP to LAN',
);

$config['filter']['rule'][] = array(
    'type' => 'pass',
    'interface' => 'lan',
    'ipprotocol' => 'inet',
    'protocol' => 'udp',
    'source' => array('any' => true),
    'destination' => array('network' => 'LAN net', 'port' => '53'),
    'descr' => 'Allow DNS to LAN',
);

$config['filter']['rule'][] = array(
    'type' => 'pass',
    'interface' => 'lan',
    'ipprotocol' => 'inet',
    'protocol' => 'tcp',
    'source' => array('any' => true),
    'destination' => array('network' => 'LAN net', 'port' => '389'),
    'descr' => 'Allow LDAP to LAN',
);

$config['filter']['rule'][] = array(
    'type' => 'pass',
    'interface' => 'lan',
    'ipprotocol' => 'inet',
    'protocol' => 'tcp',
    'source' => array('any' => true),
    'destination' => array('network' => 'LAN net', 'port' => '80'),
    'descr' => 'Allow HTTP to LAN',
);

$config['filter']['rule'][] = array(
    'type' => 'pass',
    'interface' => 'lan',
    'ipprotocol' => 'inet',
    'protocol' => 'tcp',
    'source' => array('any' => true),
    'destination' => array('network' => 'LAN net', 'port' => '3306'),
    'descr' => 'Allow MySQL to LAN',
);

$config['filter']['rule'][] = array(
    'type' => 'pass',
    'interface' => 'lan',
    'ipprotocol' => 'inet',
    'protocol' => 'tcp',
    'source' => array('any' => true),
    'destination' => array('network' => 'LAN net', 'port' => '5985'),
    'descr' => 'Allow WinRM (HTTP) to LAN',
);

// === ALLOW RULES FOR DMZ SCORING SERVICES ===
$config['filter']['rule'][] = array(
    'type' => 'pass',
    'interface' => 'dmz',
    'ipprotocol' => 'inet',
    'protocol' => 'tcp',
    'source' => array('any' => true),
    'destination' => array('network' => 'DMZ net', 'port' => '80'),
    'descr' => 'Allow HTTP to DMZ',
);

$config['filter']['rule'][] = array(
    'type' => 'pass',
    'interface' => 'dmz',
    'ipprotocol' => 'inet',
    'protocol' => 'tcp',
    'source' => array('any' => true),
    'destination' => array('network' => 'DMZ net', 'port' => '21'),
    'descr' => 'Allow FTP to DMZ',
);

$config['filter']['rule'][] = array(
    'type' => 'pass',
    'interface' => 'dmz',
    'ipprotocol' => 'inet',
    'protocol' => 'tcp',
    'source' => array('any' => true),
    'destination' => array('network' => 'DMZ net', 'port' => '3306'),
    'descr' => 'Allow MySQL to DMZ',
);

// Save and apply
write_config();
filter_configure();
